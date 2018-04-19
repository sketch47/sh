<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/include/dataBase/AB.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/application.php");
include_once($_SERVER['DOCUMENT_ROOT']."/admin/user.php");

?>

<?if(app::GetCurPage() != "/admin/")
    if(app::GetCurPage() != "/admin/in/")
        if(!user::getLogin())
          app::Redirect("/404.php");
?>
<head>
    <script src="/components/template/js/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

    <link rel="stylesheet" href="/components/template/css/modal.css" />
    <link rel="stylesheet" href="/admin/static_include/style.css" />
    <link rel="stylesheet" href="/components/template/css/pixi-tab.css"/>
    <title></title>
</head>
<body>

<?if(app::GetCurPage()!="/admin/in/"):?>
    <div class="admin_h">
    </div>
    <div class="admin">
        <div class="left_menu">
            <? include($_SERVER['DOCUMENT_ROOT']."/admin/static_include/left_menu.php");?>
        </div>
        <div class="admin_content">
<?endif;?>

