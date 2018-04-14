<?php
include ($_SERVER['DOCUMENT_ROOT'].'/components/template/header.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/components/stati/statidetail/template.php');

PrintDetail($_REQUEST["CODE"]);

include ($_SERVER['DOCUMENT_ROOT'].'/components/template/footer.php');


?>
