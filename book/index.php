<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/components/template/header.php');

app::title("Учебнаые пособия");

news('book');
include ($_SERVER['DOCUMENT_ROOT'].'/components/template/footer.php');