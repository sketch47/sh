<?include_once($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");?>
    <link rel='stylesheet' href='/admin/list/style.css'>

<?
$id = htmlspecialchars($_GET['id']);
$c_element = AB::QueryONE("SELECT stati.ID,stati.ACTIVATED, stati.NAME, stati.CODE, stati.SORT,
                                        stati_preview.PREVIEW_PICTURE,stati_preview.NAME as PREVIEW_NAME,stati_preview.TEXT as PREVIEW_TEXT, 
                                        stati_core.CORE_PICTIURE,stati_core.TITLE,stati_core.TEXT as CORE_TEXT
                                                FROM stati
                                                LEFT JOIN math.stati_preview ON stati_preview.ID = stati.PREVIEW_ID
                                                LEFT JOIN stati_core ON stati_core.ID = stati.CORE_ID
                                                WHERE stati.ID = '$id'
                              ");

?>

<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">Главное</a></li>
        <li><a href="#tab2">Предпросмотр</a></li>
        <li><a href="#tab3">Страница</a></li>
    </ul>
    <div class="tab-content" style="text-align: center">
        <div id="tab1" class="tab active">
            <form id="stati_main">
                <p>ID : <br><input readonly name="ID" value="<?=$c_element["ID"]?>"/><br></p>
                <p>Активация : <input name="ACTIVATED" type="checkbox" VALUE="1" <?=$c_element["ACTIVATED"] == 0?'':'checked' ?>/><br></p>
                <p>Имя : <br><input name="NAME" value="<?=$c_element["NAME"]?>"/><br></p>
                <p>Символьный код страницы : <br><input name="CODE" value="<?=$c_element["CODE"]?>"/><br></p>
                <p>Сортировка : <br><input name="SORT" value="<?=$c_element["SORT"]?>"/><br></p>
                <input onclick="test('stati_main')" type="button" value="Сохранить">
            </form>
         </div>
        <div id="tab2" class="tab">
            <form id="stati_preview">
                <p style="display: none">ID : <br><input readonly name="ID" value="<?=$c_element["ID"]?>"/><br></p>
                <p>Картинка предпросмотра(id): <br><input name="PREVIEW_PICTURE" value="<?=$c_element["PREVIEW_PICTURE"]?>"/><br></p>
                <p>Имя предпросмотра: <br><input name="PREVIEW_NAME" value="<?=$c_element["PREVIEW_NAME"]?>"/><br></p>
                <p>Текст анонса(html) : <br><textarea rows="10" cols="100" name="PREVIEW_TEXT" ><?=htmlspecialchars_decode($c_element["PREVIEW_TEXT"])?></textarea><br></p>
                <input onclick="test('stati_preview')" type="button" value="Сохранить">
            </form>
        </div>
        <div id="tab3" class="tab">
            <form id="stati_core">
                <p style="display: none">ID : <br><input readonly name="ID" value="<?=$c_element["ID"]?>"/><br></p>
                <p>Картинка статьи(id): <br><input name="CORE_PICTIURE" value="<?=$c_element["CORE_PICTIURE"]?>"/><br></p>
                <p>Заголовок страницы : <br><input name="TITLE" value="<?=$c_element["TITLE"]?>"/><br></p>
                <p>Текст страницы(html) : <br><textarea rows="10" cols="100" name="CORE_TEXT"><?=htmlspecialchars_decode($c_element["CORE_TEXT"])?></textarea><br></p>
                <input onclick="test('stati_core')" type="button" value="Сохранить">
            </form>
        </div>
    </div>
</div>

<script>
    function test($s) {
        $.ajax({
            url: '/admin/statilist/ajax.php',
            type: "POST",
            data: {
                action: $s,
                date: $('form#'+$s).serializeArray()
            },
            success: function (data) {
                console.log(data);
               if(data=="success") alert("Данные успешно обновлены");
               else alert("Произошла неудача");
            }
        });

    }

</script>
<?include_once($_SERVER['DOCUMENT_ROOT']."/admin/static_include/footer.php");?>