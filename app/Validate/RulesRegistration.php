<?php

declare(strict_types=1);

namespace App\Validate;

use App\Models\Auth\AuthModel;
use App\Content\Сheck\EmailSpam;
use App\Content\Integration\Google;
use Msg;

class RulesRegistration extends Validator
{
    public static function rules($data, $reg_ip, $inv_uid)
    {
        $invitation_code = $data['invitation_code'] ?? false;
        $redirect = $invitation_code ? '/register/invite/' . $invitation_code : url('register');

        // Check ip for ban
        // Запрет Ip на бан
        if (is_array(AuthModel::repeatIpBanRegistration($reg_ip))) {
            Msg::redirect(__('msg.multiple_accounts'), 'error', $redirect);
        }

        // Let's check the verification code
        // Проверим код проверки
        if (!$invitation_code) {
            if (config('integration', 'captcha')) {
                if (!Google::checkCaptchaCode()) {
                    Msg::redirect(__('msg.code_error'), 'error', $redirect);
                }
            }
            // Если хакинг формы (If form hacking)
            $inv_uid = 0;
        }

        // Check login
        // Проверим login
        if (!preg_match('/^[a-zA-Z0-9-]+$/u', $data['login'])) {
            Msg::redirect(__('msg.slug_correctness'), 'error', $redirect);
        }

        self::length($data['login'], 3, 12, 'nickname', $redirect);

        if (preg_match('/(\w)\1{3,}/', $data['login'])) {
            Msg::redirect(__('msg.nick_character'), 'error', $redirect);
        }

        if (in_array($data['login'], config('stop-nickname', 'list'))) {
            Msg::redirect(__('msg.nick_exist'), 'error', $redirect);
        }

        if (is_array(AuthModel::checkRepetitions($data['login'], 'login'))) {
            Msg::redirect(__('msg.nick_exist'), 'error', $redirect);
        }

        // Check Email
        // Проверим Email
        self::email($data['email'], $redirect);

        if (EmailSpam::index($data['email']) === true) {
            Msg::redirect(__('msg.email_forbidden'), 'error', $redirect);
        } 

        if (is_array(AuthModel::checkRepetitions($data['email'], 'email'))) {
            Msg::redirect(__('msg.email_replay'), 'error', $redirect);
        }

        $arr = explode('@', $data['email']);
        $domain = array_pop($arr);
        if (in_array($domain, config('stop-email', 'list'))) {
            Msg::redirect(__('msg.email_replay'), 'error', $redirect);
        }

        // Let's check the password
        // Проверим пароль
        self::length($data['password'], 8, 32, 'password', $redirect);

        if (substr_count($data['password'], ' ') > 0) {
            Msg::redirect(__('msg.password_spaces'), 'error', $redirect);
        }

        if ($data['password'] != $data['password_confirm']) {
            Msg::redirect(__('msg.pass_match_err'), 'error', $redirect);
        }

        return $inv_uid;
    }
}
