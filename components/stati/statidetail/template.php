<?php

    echo "<link rel='stylesheet' href='/components/stati/statidetail/style.css'>";
    function PrintDetail($text_code){

    $c_element = AB::QueryONE("SELECT stati.NAME, stati.CODE, 
                                        stati_core.CORE_PICTIURE, stati_core.TITLE, stati_core.TEXT 
                                                FROM stati
                                                LEFT JOIN stati_core ON stati_core.ID = stati.CORE_ID
                                                WHERE stati.CODE = '$text_code'
                                                
                              "); ?>

<?app::title($c_element["NAME"]);?>
    <div class="content">
        <h1><?=htmlspecialchars_decode($c_element["NAME"])?></h1>
        <div class="image_left">
            <img src = <?=AB::GetImgById($c_element["CORE_PICTIURE"])["SRC"]?>>
        </div>
        <div class="content__text">
            <?=htmlspecialchars_decode($c_element["TEXT"])?>
        </div>
    </div>
<title><?php echo $c_element["TITLE"]; ?></title>
<?}?>