<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class AdminUser extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    // остальной код модели

    /**
     * Получить уникальный идентификатор для аутентификации пользователя.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Получить пароль для аутентификации пользователя.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Получить строку, представляющую "запомнить меня" токен.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Установить "запомнить меня" токен для пользователя.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Получить имя столбца, хранящего "запомнить меня" токен.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
