<?php

include_once 'MovieGetter.php';

$getter=new MovieGetter();

echo $getter->getJson($_GET["title"], $_GET["year"], $_GET["plot"]);

?>
