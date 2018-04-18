<?include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/static_include/header.php");
echo "<link rel='stylesheet' href='/admin/multimedia/style.css'>";

app::title("Галлерея");

if(isset($_POST['update_submit']))
{

     $pic_name = isset($_POST['pic_name']) ? htmlspecialchars($_POST['pic_name']) : " ";
     $pic_id = isset($_POST['pic_id']) ? htmlspecialchars($_POST['pic_id']) : " ";
     $pic_alt = isset($_POST['pic_alt']) ? htmlspecialchars($_POST['pic_alt']) : " ";

    AB::QueryONE("UPDATE picture SET ALT='$pic_alt',NAME='$pic_name' WHERE id='$pic_id '");
    app::RefreshPage();
}

if(isset($_GET['YesOrNo']))
{
    $id = htmlspecialchars($_GET['YesOrNo']);
    AB::QueryONE("DELETE FROM `picture` WHERE id='$id'");
    app::RefreshPage();
}

if(isset($_POST['del']))
{
    $id = $_POST['del'];
    app::YesOrNo($id);
}

if(isset($_POST['upload']))
{
    if (explode("/", $_FILES['picture']['type'])[0] == 'image') {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/multimedia/img/';
        $type = explode("/", $_FILES['picture']['type'])[1];
        $name = md5(uniqid($_FILES['picture']['name']));
        if (@copy($_FILES['picture']['tmp_name'], $path . $name . "." . $type)) {
            $src = "/multimedia/img/".$name . "." . $type;
            AB::QueryONE("INSERT INTO picture (SRC, ALT, NAME) VALUES ('$src','','')");
            app::ShowModal(" ","Файл загружен");
            echo "<script type=\"text/javascript\">
                        $('form#add')[0].reset();
                    </script>";

        } else {
            app::ShowModal(" ","Произошла ошибка");
        }
    }
}
?>
<form enctype="multipart/form-data" method="post" id="add" >
    <input name="picture" type="file" multiple accept="image/*,image/jpeg"/>
    <input type="submit" name="upload" value="Добавить"/>
</form>

<?$arResult = AB::QueryALL("SELECT * FROM picture ORDER BY id DESC")?>
<div class="galery">
<?foreach ($arResult as $c_element):?>

<div class="image" id="<?=$c_element['ID']?>">
    <div class="image_picture">
    <a data-fancybox="gallery" href="<?=$c_element['SRC']?>" ><img src="<?=$c_element['SRC']?>" width="200px" ></a>
    </div>
    <div class="image_about">
        <div class="image_about__text" id="image_about<?=$c_element['ID']?>" style="display: none; " >
            <form method="post" name="test" id="update">
            <label for="pic_id" >ID</label><br>     <input readonly name="pic_id" value="<?=$c_element['ID']?>"/><br>
            <label for="pic_src" >SRC</label><br>   <input readonly name="pic_src" value="<?=$c_element['SRC']?>"/><br>
            <label for="pic_name">Имя</label><br>   <input name="pic_name" value="<?=$c_element['NAME']?>"/><br>
            <label for="pic_alt" >ALT</label><br>   <input name="pic_alt" value="<?=$c_element['ALT']?>" /><br>
            <button type="submit" name="update_submit">Приминить</button>
            </form>
            <p align="right"> <button data-fancybox-close="" class="btn btn-primary">Отмена</button></p>
        </div>
        <form method="post" ><button name="del" value="<?=$c_element['ID']?>">Удалить</button><a data-fancybox="" data-src="#image_about<?=$c_element['ID']?>" data-modal="true" href="javascript:;" class="btn btn-primary"><button>Детали</button></a></form>
    </div>
</div>
<?endforeach;?>


<?include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/static_include/footer.php");
