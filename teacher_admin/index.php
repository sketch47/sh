<?include ($_SERVER['DOCUMENT_ROOT'].'/components/template/header.php');
var_dump($_GET);



    $class = AB::QueryALL("SELECT * FROM class");
    ?>

<select id="school">
    <?foreach($class as $element){?>
        <option name="<?=$element["SCHOOL"]?>" value="<?=$element["ID"]?>"><?=$element["SCHOOL"]?></option>
    <?}?>
</select>
<?
if($_GET["SCHOOL"]){
$class_my = $_GET["SCHOOL"];?>

<?}?>


<?
if($_GET['SCHOOL'])
{
    $sch = $_GET['SCHOOL'];
    echo "<script>$(\"select [value='$sch']\").attr(\"selected\", \"selected\");</script>";


}

?>





<script>
$('select#school').change(function () {
window.location.href = '/teacher_admin/index.php?SCHOOL='+$(this).val();
});

$('select#class').change(function () {
    window.location.href = '/teacher_admin/index.php?SCHOOL='+$('select#school option:selected').attr('name') +'&CLASS=' + $(this).val();
});
</script>