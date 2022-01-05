<?php

namespace App\Controllers\Auth;

use Hleb\Scheme\App\Controllers\MainController;
use Hleb\Constructor\Handlers\Request;
use App\Middleware\Before\UserData;
use App\Models\User\{InvitationModel, UserModel};
use App\Models\AuthModel;
use Config, Integration, Validation, SendEmail, Translate;

class RegisterController extends MainController
{
    private $uid;

    public function __construct()
    {
        $this->uid = UserData::getUid();
    }

    // Показ формы регистрации
    public function showRegisterForm()
    {
        // Если включена инвайт система
        if (Config::get('general.invite') == true) {
            redirect('/invite');
        }

        $m = [
            'og'         => false,
            'twitter'    => false,
            'imgurl'     => false,
            'url'        => getUrlByName('register'),
        ];

        return agRender(
            '/auth/register',
            [
                'meta'  => meta($m, Translate::get('sign up'), Translate::get('info-security')),
                'uid'   => $this->uid,
                'data'  => [
                    'sheet' => 'sign up',
                    'type'  => 'register'
                ]
            ]
        );
    }

    // Отправка запроса для регистрации
    public function index()
    {
        $email      = Request::getPost('email');
        $login      = Request::getPost('login');
        $inv_code   = Request::getPost('invitation_code');
        $inv_uid    = Request::getPostInt('invitation_id');
        $password   = Request::getPost('password');
        $reg_ip     = Request::getRemoteAddress();

        $redirect = $inv_code ? '/register/invite/' . $inv_code : '/register';

        Validation::checkEmail($email, $redirect);

        if (is_array(AuthModel::replayEmail($email))) {
            addMsg(Translate::get('e-mail-replay'), 'error');
            redirect($redirect);
        }

        # Если домен указанной почты содержится в списке недопустимых
        $domain = array_pop(explode('@', $email));
        if (in_array($domain, Config::get('stop-email'))) {
            redirect($redirect);
        }

        if (is_array(AuthModel::repeatIpBanRegistration($reg_ip))) {
            addMsg(Translate::get('multiple-accounts'), 'error');
            redirect($redirect);
        }

        Validation::charset_slug($login, Translate::get('nickname'), '/register');
        Validation::Limits($login, Translate::get('nickname'), '3', '10', $redirect);

        if (preg_match('/(\w)\1{3,}/', $login)) {
            addMsg(Translate::get('nickname-repeats-characters'), 'error');
            redirect($redirect);
        }

        // Запретим, хотя лучшая практика занять нужные (пр. GitHub)
        if (in_array($login, Config::get('stop-nickname'))) {
            addMsg(Translate::get('nickname-replay'), 'error');
            redirect($redirect);
        }

        if (is_array(AuthModel::replayLogin($login))) {
            addMsg(Translate::get('nickname-replay'), 'error');
            redirect($redirect);
        }

        Validation::Limits($password, Translate::get('password'), '8', '32', $redirect);
        if (substr_count($password, ' ') > 0) {
            addMsg(Translate::get('password-spaces'), 'error');
            redirect($redirect);
        }

        if (!$inv_code) {
            if (Config::get('general.captcha')) {
                if (!Integration::checkCaptchaCode()) {
                    addMsg(Translate::get('code error'), 'error');
                    redirect('/register');
                }
            }
            // Если хакинг формы
            $inv_uid = 0;
        }

        $count =  UserModel::getUsersAllCount();
        // Для "режима запуска" первые 50 участников получают trust_level = 1 
        $tl = UserData::USER_ZERO_LEVEL;
        if ($count < 50 && Config::get('general.mode') == true) {
            $tl = UserData::USER_FIRST_LEVEL;
        }

        $params = [
            'user_login'                => $login,
            'user_email'                => $email,
            'user_template'             => Config::get('general.template'),
            'user_lang'                 => Config::get('general.lang'),
            'user_whisper'              => '',
            'user_password'             => password_hash($password, PASSWORD_BCRYPT),
            'user_limiting_mode'        => 0, // Режим заморозки выключен
            'user_activated'            => $inv_uid > 0 ? 1 : 0, // если инвайта нет, то активация
            'user_reg_ip'               => $reg_ip,
            'user_trust_level'          => $tl,
            'user_invitation_id'        => $inv_uid,
        ];

        // id участника после регистрации
        $active_uid = UserModel::createUser($params);

        if ($inv_uid > 0) {
            // Если регистрация по инвайту, активируем емайл
            InvitationModel::activate($inv_code, $inv_uid, $reg_ip, $active_uid);
            addMsg(Translate::get('successfully, log in'), 'success');
            redirect(getUrlByName('login'));
        }

        // Активация e-mail
        $email_code = randomString('crypto', 20);
        UserModel::sendActivateEmail($active_uid, $email_code);

        // Отправка e-mail
        SendEmail::mailText($active_uid, 'activate.email', ['link' => '/email/activate/' . $email_code]);

        addMsg(Translate::get('check your email'), 'success');

        redirect(getUrlByName('login'));
    }

    // Показ формы регистрации с инвайтом
    public function showInviteForm()
    {
        $code   = Request::get('code');
        $invate = InvitationModel::available($code);

        if (!$invate) {
            addMsg(Translate::get('the code is incorrect'), 'error');
            redirect('/');
        }

        return agRender(
            '/auth/register-invate',
            [
                'meta'  => meta($m = [], Translate::get('registration by invite')),
                'uid'   => $this->uid,
                'data'  => [
                    'invate' => $invate,
                    'type'  => 'invite'
                ]
            ]
        );
    }
}
