<?php

use ReallySimpleJWT\Token;

require 'vendor/autoload.php';

$token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJjbGllbnQiLCJpYXQiOjE1ODA0MDcxOTAsImV4cCI6MTYxMTk0MzE5MCwiYXVkIjoicmVzdGFwaSIsInN1YiI6InRlc3RlciJ9.oML_UZxtYuGjCGOjg3qqYJ6JWBw3a_ZADYBU76wXWGg";

//include ('MovieGetter.php');
//include ('BookGetter.php');
//$moviegetter=new MovieGetter();
//$bookgetter=new BookGetter();


if(isset($_POST['GetMovie'])){
    //$json = $moviegetter->getJson($_POST["title"], $_POST["year"], $_POST["plot"]);//tähän filegetcontents lopuksi. osoittaa /getMovie
}
if(isset($_POST['GetBook'])){
    //$json = $bookgetter->getJson($_POST["isbn"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<div id="movie">
    <form  method="post">
        <h1>Hae elokuvaa</h1>
        Title: <input type="text" name="title"><br>
        Year: <input type="text" name="year"><br>
        Plot: <input type="radio" name="plot" value="full" checked="checked"> Full
        <input type="radio" name="plot" value="short"> Short<br>
        <input type="submit" name="GetMovie" value="true">
    </form>
</div>


<div id="book">
    <h1>Hae kirjaa</h1>
    <form method="post">
        isbn: <input type="text" name="isbn"><br>
        <input type="submit" name="GetBook" value="true">
    </form>
</div>

<div id="result">
    <?php
    if(isset($_POST['GetMovie']) || isset($_POST['GetBook'])){
       // echo $json;
    }
    ?>
</div>

</body>
</html>