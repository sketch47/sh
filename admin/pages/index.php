<?include_once($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");?>

<?app::addStyle('/admin/list/style.css'); ?>
    <select class="page_select">
        <option value="all">Все</option>
        <option value="stati">Статьи</option>
        <option value="news">Новости</option>
        <option value="book">Учебные пособия</option>
    </select>

<?
if($_GET['CATEGORY'] == "all")
{
    $arResult = AB::QueryALL("SELECT * FROM `stati` ");

}
else
{
    $category = $_GET['CATEGORY'];
    $arResult = AB::QueryALL("SELECT * FROM `stati` WHERE CATEGORY='$category'");
    echo "<script>$(\"select [value='$category']\").attr(\"selected\", \"selected\");</script>";
}

?>
<button class="btn" id="addPages">Создать страницу</button>
<?if($arResult):?>
<div class="page-list">
    <div class="page-list_items">
            <table class="page-list_items__element">
                <thead>
                <tr>
                    <td class="page-list_items__element___id">ID</td>
                    <td class="page-list_items__element___name">Название</td>
                    <td class="page-list_items__element___code">Символьный код страницы</td>
                    <td class="page-list_items__element___sort">Сортировка</td>
                    <td class="page-list_items__element___activated">Активация</td>
                    <td class="page-list_items__element___category">Категория</td>
                    <td>Править</td>
                </tr>
                </thead>
                <tbody>
                <?foreach ($arResult as $c_element):?>
                <tr>
                    <td class="page-list_items__element___id"><?=$c_element['ID']?></td>
                    <td class="page-list_items__element___name"><?=$c_element['NAME']?></td>
                    <td class="page-list_items__element___code"><?=$c_element['CODE']?></td>
                    <td class="page-list_items__element___sort"><?=$c_element['SORT']?></td>
                    <td class="page-list_items__element___activated"><?=$c_element['ACTIVATED']==1?'Да':'Нет'?></td>
                    <td class="page-list_items__element___category"><?=$c_element['CATEGORY']?></td>
                    <td align="center"><a href="/admin/pages/edit.php?id=<?=$c_element['ID']?>">-></a></td>
                </tr>
                <?endforeach;?>
                </tbody>
            </table>
    </div>

</div>
<?endif;?>
<?include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/static_include/footer.php");?>
<script>
    $('select').change(function () {
        window.location.href = '/admin/pages/index.php?CATEGORY='+$(this).val();
    });
    $('#addPages').click(function () {
        window.location.href = '/admin/pages/ajax.php?action=add&CATEGORY='+$('select').val();
    });
</script>
