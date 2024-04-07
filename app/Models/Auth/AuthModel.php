<?php

declare(strict_types=1);

namespace App\Models\Auth;

use Hleb\Base\Model;
use Hleb\Static\DB;

class AuthModel extends Model
{
    // Check for repetitions  
    // Проверка на повторы
    public static function checkRepetitions(string $params, string $type): array|bool
    {
        $field = ($type == 'email') ? 'email' : 'login';

        $sql = "SELECT login, email FROM users WHERE $field = :params";

        return DB::run($sql, ['params' => $params])->fetch();
    }

    // Login is banned and the ban is not lifted, then ban and ip 
    // Login забанен и бан не снят, то запретить и ip
    public static function repeatIpBanRegistration(string $ip)
    {
        $sql = "SELECT
                    banlist_ip,
                    banlist_status
                        FROM users_banlist
                        WHERE banlist_ip = :ip AND banlist_status = 1";

        return DB::run($sql, ['ip' => $ip])->fetch();
    }

    public static function getAuthTokenByUserId(int $user_id): array|bool
    {
        $sql = "SELECT
                    auth_id,
                    auth_user_id,
                    auth_selector,
                    auth_hashedvalidator,
                    auth_expires
                        FROM users_auth_tokens
                        WHERE auth_user_id = :user_id";

        return DB::run($sql, ['user_id' => $user_id])->fetch();
    }

    public static function insertToken(array $params): \PDOStatement|bool
    {
        $sql = "INSERT INTO users_auth_tokens(auth_user_id, auth_selector, auth_hashedvalidator, auth_expires) 
                       VALUES(:auth_user_id, :auth_selector, :auth_hashedvalidator, :auth_expires)";

        return DB::run($sql, $params);
    }

    public static function updateToken(array $params): \PDOStatement|bool
    {
        $sql = "UPDATE users_auth_tokens 
                    SET auth_selector           = :auth_selector, 
                        auth_hashedvalidator    = :auth_hashedvalidator, 
                        auth_expires            = :auth_expires
                            WHERE auth_user_id  = :auth_user_id";

        return DB::run($sql, $params);
    }

    // Get an authentication token by selector 
    // Получаем токен аутентификации по селектору
    public static function getAuthTokenBySelector(string $selector): array|bool
    {
        $sql = "SELECT
                    auth_id,
                    auth_user_id,
                    auth_selector,
                    auth_hashedvalidator,
                    auth_expires
                        FROM users_auth_tokens
                        WHERE auth_selector = :auth_selector";

        return DB::run($sql, ['auth_selector' => $selector])->fetch();
    }

    public static function UpdateSelector(array|bool $params): \PDOStatement|bool
    {
        $sql = "UPDATE users_auth_tokens 
                    SET auth_hashedvalidator    = :auth_hashedvalidator,  
                        auth_expires            = :auth_expires
                            WHERE auth_selector = :auth_selector";

        return DB::run($sql, $params);
    }

    public static function deleteTokenByUserId(int $user_id): \PDOStatement|bool
    {
        $sql = "DELETE FROM users_auth_tokens WHERE auth_user_id = :user_id";

        return DB::run($sql, ['user_id' => $user_id]);
    }
	
    public static function getUser(int $id): array
    {
        $sql = "SELECT 
                    id,
                    login,
                    limiting_mode,
                    scroll,
                    email,
                    avatar,
                    trust_level,
                    template,
                    lang,
                    nsfw,
					post_design,
                    invitation_available,
                    ban_list,
                    is_deleted
                        FROM users
                                WHERE id = :id";

        return DB::run($sql, ['id' => $id])->fetch();
    }
	
    public static function userInfo(string $email): array|bool
    {
        $sql = "SELECT 
                   id, 
                   email, 
                   password,
                   login,
                   name,
                   template,
                   lang,
                   avatar,
                   trust_level,
                   ban_list,
                   limiting_mode
                        FROM users 
                            WHERE email = :email";

        return DB::run($sql, ['email' => $email])->fetch();
    }

    // Does the user find in the ban list
    // Находит ли пользователь в бан- листе
    public static function isBan(int $user_id): array|bool
    {
        $sql = "SELECT
                    banlist_user_id,
                    banlist_status
                        FROM users_banlist
                            WHERE banlist_user_id = :user_id AND banlist_status = 1";

        return DB::run($sql, ['user_id' => $user_id])->fetch();
    }

    // Whether the user is in silent mode
    // Находит ли пользователь в бесшумном режиме
    public static function isLimitingMode(int $user_id): array
    {
        $sql = "SELECT id, limiting_mode FROM users WHERE id = :user_id AND limiting_mode = 1";

        return DB::run($sql, ['user_id' => $user_id])->fetch();
    }

    // Is the user activated (e-mail)
    // Активирован ли пользователь (e-mail)
    public static function isActivated(int $user_id): array|bool
    {
        $sql = "SELECT id, activated FROM users WHERE id = :user_id AND activated = 1";

        return DB::run($sql, ['user_id' => $user_id])->fetch();
    }

    // Has the user been deleted?
    // Удален ли пользователь?
    public static function isDeleted(int $user_id): array|bool
    {
        $sql = "SELECT id, is_deleted FROM users WHERE id = :user_id AND is_deleted = 1";

        return DB::run($sql, ['user_id' => $user_id])->fetch();
    }
	
    // Check activation code e-mail
    // Проверяем код активации e-mail
    public static function getEmailActivate(string $code): array|bool
    {
        $sql = "SELECT
                    user_id,
                    email_code,
                    email_activate_flag
                        FROM users_email_activate
                            WHERE email_code = :code AND email_activate_flag != :flag";

        return DB::run($sql, ['code' => $code, 'flag' => 1])->fetch();
    }

    /**
     * Activate email
     * Активируем e-mail
     *
     * @param integer $user_id
     * @return boolean
     */
    public static function setEmailActivate(int $user_id): \PDOStatement|bool
    {
        $sql = "UPDATE users_email_activate SET email_activate_flag = :flag WHERE user_id = :user_id";

        DB::run($sql, ['user_id' => $user_id, 'flag' => 1]);

        $sql = "UPDATE users SET activated = :flag WHERE id = :user_id";

        return DB::run($sql, ['user_id' => $user_id, 'flag' => 1]);
    }
	
    /**
     * Email Activation
     * Активация Email
     *
     * @param array $params
     * @return boolean
     */
    public static function sendActivateEmail(array $params): \PDOStatement|bool
    {
        $sql = "INSERT INTO users_email_activate(user_id, email_code) VALUES(:user_id, :email_code)";

        return DB::run($sql, $params);
    }

    /**
     * For a one-time use of the recovery code
     * Для одноразового использования кода восстановления
     *
     * @param integer $user_id
     * @return boolean
     */
    public static function editRecoverFlag(int $user_id): \PDOStatement|bool
    {
        $sql = "UPDATE users_activate SET activate_flag = 1 WHERE activate_user_id = :user_id";

        return DB::run($sql, ['user_id' => $user_id]);
    }
	
    /**
     * Check the password change code (whether it was used or not)
     * Проверяем код смены пароля (использовали его или нет)
     *
     * @param string $code
     * @return array
     */
    public static function getPasswordActivate(string $code): array|bool
    {
        $sql = "SELECT
                    activate_id,
                    activate_date,
                    activate_user_id,
                    activate_code,
                    activate_flag
                        FROM users_activate
                            WHERE activate_code = :code AND activate_flag != 1";

        return DB::run($sql, ['code' => $code])->fetch();
    }
	
    /**
     * Password Recovery
     * Восстановление пароля
     *
     * @param array $params
     * @return boolean
     */
    public static function initRecover(array $params): \PDOStatement|bool
    {
        $sql = "INSERT INTO users_activate(activate_date, activate_user_id, activate_code) VALUES(:activate_date, :activate_user_id, :activate_code)";

        return DB::run($sql, $params);
    }
}