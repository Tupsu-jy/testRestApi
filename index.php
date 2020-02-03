<?php
//jwt jolla apia voi käyttää. Ei hyvä paikka siirrä myöhemmin
$token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJjbGllbnQiLCJpYXQiOjE1ODA0MDcxOTAsImV4cCI6MTYxMTk0MzE5MCwiYXVkIjoicmVzdGFwaSIsInN1YiI6InRlc3RlciJ9.oML_UZxtYuGjCGOjg3qqYJ6JWBw3a_ZADYBU76wXWGg";
$url = "https://testrestapi123.herokuapp.com/";//restapin osoite

$options = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"token:".$token//lähetetään jwt headerissä
    )
);

$context = stream_context_create($options);
//kun "hae" nappia painettu niin tapahtuu
if(isset($_POST['GetMovie'])){
    $getmoviedata = http_build_query(//lisätään kaikki hakuarvot leffahakua varten
        array(
            'title' => $_POST["title"],
            'year' => $_POST["year"],
            'plot'=> $_POST["plot"]
        )
    );
    //tehdään get request apille. lisätään yllä määritelty array jonka tiedoilla leffaa haetaan. $json echotaan sivulle alempana
    $json =file_get_contents($url."getMovie.php?".$getmoviedata, false, $context);
}
//kun "hae" nappia painettu niin tapahtuu
if(isset($_POST['GetBook'])){//lisätään kaikki hakuarvot kirjaahakua varten
    $getbookdata = http_build_query(
        array(
            'isbn' => $_POST["isbn"]
        )
    );
    //tehdään get request apille. lisätään yllä määritelty array jonka tiedoilla kirjaa haetaan. $json echotaan sivulle alempana
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
    if(isset($_POST['GetMovie']) || isset($_POST['GetBook'])){//jos post on tehty
        echo $json;//tulostetaan json mitä ylempänä oleva php hakee
    }
    ?>
</div>

</body>
</html>