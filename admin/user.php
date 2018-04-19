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
        if($login == "admin")
         $_SESSION['login'] = $login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        if($password == "SderW4Q1")
            $_SESSION['password'] = $password;
    }
    public function exitUser(){
        $_SESSION['login'] = '';
            $_SESSION['password'] = '';
    }
}

