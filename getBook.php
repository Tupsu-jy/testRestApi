<?php
include_once 'BookGetter.php';

$getter=new BookGetter();

echo $getter->getJson($_GET["isbn"]);
?>