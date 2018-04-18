<?include_once($_SERVER['DOCUMENT_ROOT']."/admin/static_include/header.php");?>

<?app::addStyle('/admin/list/style.css'); ?>
<?
$category = $_GET['CATEGORY'];
$arResult = AB::QueryALL("SELECT * FROM `stati` WHERE CATEGORY = '$category'  ORDER BY ID DESC ");
?>

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
                    <td align="center"><a href="/admin/list/edit.php?id=<?=$c_element['ID']?>">-></a></td>
                </tr>
                <?endforeach;?>
                </tbody>
            </table>
    </div>

</div>
<?include_once($_SERVER['DOCUMENT_ROOT'] . "/admin/static_include/footer.php");?>