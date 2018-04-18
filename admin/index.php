<?include ($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");?>


<?echo "<link rel='stylesheet' href='/admin/multimedia/style.css'>" ?>
<?//var_dump(user::getLogin()) ?>

<?if (user::getLogin()=="" && user::getPassword()=="") app::Redirect('/admin/in/');?>
text
