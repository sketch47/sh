<?php

include ($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");

if(isset($_POST['in']))
{
    var_dump($_POST);
    $login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : "0";
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "0";
    user::setLogin($login);
    user::setPassword($password);

    app::Redirect("/admin");
}

?>

<div class="form_in">
    <form method="post" >
    <label for="login">Логин</label><br>
    <input name="login" type="text"/><br>
    <label for="password">Пароль</label><br>
    <input name="password" type="password"/><br>
    <button name="in" type="submit">Вход</button>
    </form>
</div>
