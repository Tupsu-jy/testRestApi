<?php

use ReallySimpleJWT\Token;

require 'vendor/autoload.php';
include_once 'MovieGetter.php';

$getter=new MovieGetter();
$token="";
if(isset($_SERVER['HTTP_TOKEN'])){
    $token = $_SERVER['HTTP_TOKEN'];
}
if(Token::validate($token, "qwertyuiopasdfghjklzxcvbnm123456")){
    echo $getter->getJson($_GET["title"], $_GET["year"], $_GET["plot"]);
}else{
    echo "ei oikeuksia";
}


?>
