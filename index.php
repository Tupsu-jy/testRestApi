<?php

$token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJjbGllbnQiLCJpYXQiOjE1ODA0MDcxOTAsImV4cCI6MTYxMTk0MzE5MCwiYXVkIjoicmVzdGFwaSIsInN1YiI6InRlc3RlciJ9.oML_UZxtYuGjCGOjg3qqYJ6JWBw3a_ZADYBU76wXWGg";
$url = "https://testrestapi123.000webhostapp.com/";

$options = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"token:".$token
    )
);

$context = stream_context_create($options);

if(isset($_POST['GetMovie'])){
    $getmoviedata = http_build_query(
        array(
            'title' => $_POST["title"],
            'year' => $_POST["year"],
            'plot'=> $_POST["plot"]
        )
    );

    $json =file_get_contents($url."getMovie.php?".$getmoviedata, false, $context);
}
if(isset($_POST['GetBook'])){
    $getbookdata = http_build_query(
        array(
            'isbn' => $_POST["isbn"]
        )
    );

    $json =file_get_contents($url."getBook.php?".$getbookdata, false, $context);
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
        <input type="submit" name="GetMovie" value="hae">
    </form>
</div>

<div id="book">
    <h1>Hae kirjaa</h1>
    <form method="post">
        isbn: <input type="text" name="isbn"><br>
        <input type="submit" name="GetBook" value="hae">
    </form>
</div>

<div id="result">
    <?php
    if(isset($_POST['GetMovie']) || isset($_POST['GetBook'])){
        echo $json;
    }
    ?>
</div>

</body>
</html>