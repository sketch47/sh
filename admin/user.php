<?php

class user
{

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $_SESSION['login'];
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return  $_SESSION['password'];
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $_SESSION['login'] = $login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $_SESSION['password'] = $password;
    }
}

