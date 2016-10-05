<?php

/**
 * Class User
 */
class User extends Model
{
    /**
     * @var string
     */
    public $name = 'admin';
    /**
     * @var string
     */
    private $password = 'password';

    /**
     * @param $password
     * @return bool
     */
    public function checkPassword($password)
    {
        return $password == $this->password;
    }

    /**
     *
     */
    public function login()
    {
        $_SESSION['logged'] = true;
    }

    /**
     * @return bool
     */
    public function isLogged()
    {
        return isset($_SESSION['logged']);
    }

    public function logout()
    {
        unset($_SESSION['logged']);
    }
}