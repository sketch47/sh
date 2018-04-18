<?include_once($_SERVER['DOCUMENT_ROOT']."/include/dataBase/AB.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/application.php");

$action =  $_GET["action"]==NULL? $_POST["action"] : $_GET["action"] ;//?$_GET["action"]:$_POST["action"];
$arResult = $_POST['date'];

switch ($action){
    case 'stati_main':
        foreach ($arResult as $c_element){
            $array[$c_element["name"]] = $c_element["value"];
        }
        $name = htmlspecialchars($array['NAME']);
        $sort = htmlspecialchars($array['SORT']);
        $code = htmlspecialchars($array['CODE']);
        $category = htmlspecialchars($array['CATEGORY']);
        $id = $array['ID'];
        $active = isset($array['ACTIVATED'])? "1":"0";
        $s = AB::QueryONE("UPDATE stati SET ACTIVATED=$active, NAME='$name',SORT=$sort,CODE='$code',CATEGORY ='$category'  WHERE ID='$id'");

        if($s!=0) echo "fail"; else echo "success";
        break;

    case 'stati_preview':
        foreach ($arResult as $c_element){
            $array[$c_element["name"]] = htmlspecialchars($c_element["value"]);
        }
        $pic = $array['PREVIEW_PICTURE'];
        $name = $array['PREVIEW_NAME'];
        $text = $array['PREVIEW_TEXT'];
        $id = $array['ID'];
        $s = AB::QueryONE("UPDATE stati_preview SET PREVIEW_PICTURE=$pic, NAME='$name',TEXT='$text' WHERE ID='$id'");
        if($s!=0) echo "fail"; else echo "success";
        break;

    case 'stati_core':
        foreach ($arResult as $c_element){
            $array[$c_element["name"]] = htmlspecialchars($c_element["value"]);
        }
        $pic = $array['CORE_PICTIURE'];
        $title = $array['TITLE'];
        $text = $array['CORE_TEXT'];
        $id = $array['ID'];
        $s = AB::QueryONE("UPDATE stati_core SET CORE_PICTIURE=$pic, TITLE='$title',TEXT='$text' WHERE ID='$id'");
        if($s!=0) echo "fail"; else echo "success";
        break;
    case 'add':
        $category =  $_GET["CATEGORY"];
        var_dump($category);
        AB::QueryONE("INSERT INTO `stati_preview`( `PREVIEW_PICTURE`, `NAME`, `TEXT`) VALUES ('1','','')");
        AB::QueryONE("INSERT INTO `stati_core`( `CORE_PICTIURE`, TITLE, `TEXT`) VALUES ('1','','')");

        $id_preview = AB::LastId('stati_preview');
        $id_core = AB::LastId('stati_core');
        $id_main = AB::LastId('stati');

        AB::QueryONE("INSERT INTO stati( ACTIVATED, NAME, SORT, CODE, PREVIEW_ID, CORE_ID, CATEGORY) VALUES (0,' ','500',$id_main,1,1,'$category')");
        $id_main = AB::LastId('stati');
        AB::QueryONE("UPDATE `stati` SET `PREVIEW_ID` = '$id_preview' WHERE `stati`.`ID` = $id_main");
        AB::QueryONE("UPDATE `stati` SET `CORE_ID` = '$id_core' WHERE `stati`.`ID` = $id_main");

        app::Redirect("/admin/pages/edit.php?id=".$id_main);
        break;
    case 'delete':
            $id = $_GET['id'];
            $res = AB::QueryONE("SELECT PREVIEW_ID,CORE_ID FROM stati WHERE ID = $id");
            $pw_id = $res["PREVIEW_ID"];
            $c_id = $res["CORE_ID"];
            var_dump($pw_id);
            AB::QueryONE("DELETE FROM stati WHERE ID = $id");
            AB::QueryONE("DELETE FROM stati_preview WHERE ID = $pw_id");
            AB::QueryONE("DELETE FROM stati_core WHERE ID = $c_id");
            app::Redirect("/admin/pages/index.php?CATEGORY=all");
        break;
}