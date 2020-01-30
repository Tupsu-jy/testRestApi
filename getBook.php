<?php
include_once 'BookGetter.php';
use ReallySimpleJWT\Token;

require 'vendor/autoload.php';
$getter=new BookGetter();

$token="";
if(isset($_SERVER['HTTP_TOKEN'])){
    $token = $_SERVER['HTTP_TOKEN'];
}
if(Token::validate($token, "qwertyuiopasdfghjklzxcvbnm123456")){
    echo $getter->getJson($_GET["isbn"]);
}else{
    echo "ei oikeuksia";
}

?>