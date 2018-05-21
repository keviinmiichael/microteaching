<?php
session_start();
$color = '#fff';

if ( !isset($_SESSION['name'])) {
    header('location:inicio.php');
    exit;
}else if (!isset($_COOKIE[$_SESSION['name']])) {
    header('location:color.php');
    exit;
}else {
    $color = $_COOKIE[$_SESSION['name']];
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <title>Clase de cookies</title>
    </head>
    <body style="background-color:<?=$color?>">
        <div class="container" style="margin-top:100px">
            <div class="row">
                <div class="col">
                    <h2>Ya puedes navegar la pagina <?=$_SESSION['name']?></h2>
                </div>
            </div>
        </div>
    </body>
</html>
<pre>
