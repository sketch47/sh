<?include ($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");?>
<?if (user::getLogin()=="" && user::getPassword()=="") app::Redirect('/admin/in/');?>
