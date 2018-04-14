<?php

    echo "<link rel='stylesheet' href='/components/stati/statilist/style.css'>";
    $arResult = AB::QueryALL("SELECT stati.ID,stati.NAME,stati.CODE,
                                    stati_preview.PREVIEW_PICTURE,stati_preview.NAME,stati_preview.TEXT as PREVIEW_TEXT, 
                                    stati_core.CORE_PICTIURE,stati_core.TITLE,stati_core.TEXT as CORE_TEXT
                                    FROM math.stati
                                    LEFT JOIN math.stati_preview ON stati_preview.ID = stati.PREVIEW_ID
                                    LEFT JOIN math.stati_core ON stati_core.ID = stati.CORE_ID"
                            );
   ?>
    <div class="content">
        <?foreach ($arResult as $c_element):?>
        <div class="stati_preview">

            <img src = <?=AB::GetImgById($c_element["PREVIEW_PICTURE"])["SRC"]?>>
            <div class="stati_preview__text">
                <div class="stati_preview__title"><h2>  <?=$c_element["TITLE"]?>    </h2></div>
                <?=$c_element["PREVIEW_TEXT"]?>        </div>
            <a href="/stati/detail/<?=$c_element["CODE"]?>/"><button
                        class="stati_preview__detail">Подробнее -></button></a>
        </div>
        <?endforeach;?>
    </div>