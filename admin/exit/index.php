<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/static_include/header.php");
user::setLogin("");
user::setPassword("");
app::Redirect("/");
