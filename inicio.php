<?php
session_start();
if (isset($_SESSION['name']) && isset($_COOKIE[$_SESSION['name']])) {
    header('location:exito.php');
    exit;
}
function validar($data){
    $errores = [];
    $name = $data['name'];
    if ($name == '') {
        $errores['name'] = 'Porfavor completá tu nombre';
    }
    return $errores;
}

$errors = [];
$name = '';

if ($_POST) {
    $name = $_POST['name'];

    $errors = validar($_POST);

    if (empty($errors)) {
        if (isset($_COOKIE[$name])) {
            $_SESSION['name'] = $name;
            header('location:exito.php');
            exit;
        }
        $_SESSION['name'] = $name;
        header('location:color.php');
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
                    <form method="post">
                      <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ingresá tu nombre..." value="<?=$name?>">
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
