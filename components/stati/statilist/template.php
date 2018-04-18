<?php




app::addStyle('/components/stati/statilist/style.css');
function news($category){

    $x = 'stati';
    $preview = $x."_preview";
    $core = $x."_core";

    $str = "SELECT $x.ID,$x.ACTIVATED,$x.NAME,$x.CODE,
                                    $preview.PREVIEW_PICTURE,$preview.NAME as PREVIEW_NAME,$preview.TEXT as PREVIEW_TEXT, 
                                    $core.CORE_PICTIURE,$core.TITLE,$core.TEXT as CORE_TEXT
                                    FROM math.$x
                                    LEFT JOIN stati_preview ON $preview.ID = $x.PREVIEW_ID
                                    LEFT JOIN $core ON $core.ID = $x.CORE_ID
                                    WHERE $x.CATEGORY = '$category'
                                    ORDER BY SORT DESC
                                    ";


    $arResult = AB::QueryALL($str);

    ?>
    <div class="content">
        <?foreach ($arResult as $c_element):?>
        <?if($c_element['ACTIVATED']==1):?>
            <div class="stati_preview">

                <img src = <?=AB::GetImgById($c_element["PREVIEW_PICTURE"])["SRC"]?>>
                <div class="stati_preview__text">
                    <div class="stati_preview__title"><h2>  <?=htmlspecialchars_decode($c_element["PREVIEW_NAME"])?>    </h2></div>
                    <?$s = htmlspecialchars_decode($c_element["PREVIEW_TEXT"],ENT_NOQUOTES)?>
                    <?=$s?>        </div>

                <a href="/<?=$category?>/detail/<?=htmlspecialchars_decode($c_element["CODE"])?>/"><button
                            class="stati_preview__detail">Подробнее -></button></a>
            </div>
        <?endif;?>
        <?endforeach;?>
    </div>
<?}?>
