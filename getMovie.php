<?php

use ReallySimpleJWT\Token;//käytetään jwt validoimiseen

require 'vendor/autoload.php';
include_once 'MovieGetter.php';

$getter=new MovieGetter();//olio jolla haku omdb:hen tehdään
$token="";
if(isset($_SERVER['HTTP_TOKEN'])){
    $token = $_SERVER['HTTP_TOKEN'];//otetaan jwt headerista
}
//jos jwt läpäisee validoinnin niin haetaan
if(Token::validate($token, "qwertyuiopasdfghjklzxcvbnm123456")){
    echo $getter->getJson($_GET["title"], $_GET["year"], $_GET["plot"]);
    //hakuolio hakee arvoilla mitkä sille syötetään. tulostetaan sivulle json
}else{
    echo "ei oikeuksia";
}


?>
