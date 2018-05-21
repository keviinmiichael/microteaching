<?php
session_start();
if(!isset($_SESSION['name'])){
    header('location:inicio.php');
    exit;
}else if (isset($_COOKIE[$_SESSION['name']])) {
    header('location:exito.php');
    exit;
}
$color='';
function validar($data){
    $errores = [];
    $color = $data['color'];
    if ($color == '') {
        $errores['color'] = 'Porfavor elegí un color de fondo';
    }
    return $errores;
}
$colores = [
    'Azul' => '#3157EF',
    'Rojo' => '#F70909',
    'Blanco' => '#FFFFFF',
];
$errors = [];
$color = '';
if ($_POST) {
    $color = $_POST['color'];

    $errors = validar($_POST);

    if (empty($errors)) {
        setcookie($_SESSION['name'],$color, time() + 3600);
        header('location:exito.php');
        exit;
    }


}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <title>Clase de cookies</title>
    </head>
    <body>
        <div class="container" style="margin-top:100px">
            <div class="row">
                <div class="col">
                    <h3>Bienvenide <?=$_SESSION['name']?></h3>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <form method="post">
                      <div class="form-group">
                            <label for="color">Color de fondo:</label>
                            <select class="form-control" id="color" name="color">
                              <option value="">Elegí un color</option>
                              <?php foreach ($colores as $key => $value): ?>
                                      <?php if ($value == $color): ?>
                                          <option selected value="<?=$value?>"><?=$key?></option>
                                      <?php else: ?>
                                          <option value="<?=$value?>"><?=$key?></option>
                                      <?php endif; ?>
                              <?php endforeach; ?>
                            </select>
                        </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <br><br><br>
                    <?php if (!empty($errors)) {
                        foreach ($errors as $key => $value) { ?>
                            <div class="alert alert-danger" role="alert">
                              <?=$value?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </body>
</html>
<pre>
