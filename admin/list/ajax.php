<?include_once($_SERVER['DOCUMENT_ROOT']."/include/dataBase/AB.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/application.php");

$action = $_POST["action"];
$arResult = $_POST['date'];
switch ($action){
    case 'stati_main':
        foreach ($arResult as $c_element){
            $array[$c_element["name"]] = $c_element["value"];
        }
        $name = htmlspecialchars($array['NAME']);
        $sort = htmlspecialchars($array['SORT']);
        $code = htmlspecialchars($array['CODE']);
        $id = $array['ID'];
        $active = isset($array['ACTIVATED'])? "1":"0";
        $s = AB::QueryONE("UPDATE stati SET ACTIVATED=$active, NAME='$name',SORT=$sort,CODE='$code' WHERE ID='$id'");

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
}