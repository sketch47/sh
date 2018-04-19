<?php

include ($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");

if(isset($_POST['in']))
{
    $login = isset($_POST['login']) ? htmlspecialchars($_POST['login']) : "0";
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : "0";
    user::setLogin($login);
    user::setPassword($password);

    if(user::getLogin())
        app::Redirect("/admin");
    else
        app::Redirect("/admin/in");
}
if(isset($_POST['exit']))
{
    app::Redirect("/");
}
?>

<div class="form_in" style="
    display: flex;
    justify-content: center;
    padding-top: 25%;
">
    <form method="post" >
    <label for="login">Логин</label><br>
    <input name="login" type="text"/><br>
    <label for="password">Пароль</label><br>
    <input name="password" type="password"/><br>
    <button name="in" type="submit">Вход</button>
    <button name="exit" type="submit">Отмена</button>
    </form>
</div>
