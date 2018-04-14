<?echo "<link rel='stylesheet' href='/admin/style.css'>"?>
<?var_dump($_FILES['picture'])?>
<?
$path = '/';?>
<?if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))?>
<div class="admin_h">

</div>
<div class="admin">
    <div class="left_menu">
        <?include ($_SERVER['DOCUMENT_ROOT']."/admin/left_menu.php");?>
    </div>
    <div class="admin_content">

        <form enctype="multipart/form-data" method="post">
            <input name="picture" type="file" />
            <input type="submit" value="Загрузить" />
        </form>
        <button>Добавить</button>
    </div>ds
</div>