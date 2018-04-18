<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/components/template/header.php');

app::title("list");

news('news');
include ($_SERVER['DOCUMENT_ROOT'].'/components/template/footer.php');