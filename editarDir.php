<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT dni, nomb_dir, ape_dir FROM directores WHERE cod_dir='$codigo'";
$query = pg_query($sql);
$rowd = pg_fetch_object($query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../../public/css/inicio.css">
        <script src="prueba.js"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>

<dialog open id="modal-editar" class="modal-estilo"> 

<div class="numberCircle">
            <img src="images/edit.png" alt="" srcset="">
        </div>

        <div class="contenido-modal">   

        <div class="title-modal">
           <a href="directivos.php"> <div id="btn-cerrar-modal"><i class="fa-solid fa-xmark"></i></div> </a>
        </div>

<form class="formulario" action="updateDir.php" method="POST">

<input value="<?php echo $codigo ?>" type="hidden" name="codigo">

<input class="enjoy-css" type="text" name="dni" placeholder="Dni" value="<?php echo $rowd->dni ?>">
<input class="enjoy-css" type="text" name="nombres" placeholder="Nombres" value="<?php echo $rowd->nomb_dir ?>">
<input class="enjoy-css" type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $rowd->ape_dir ?>">

<input type="submit" value="Editar">


</form>

</div>

</dialog>


</body>
</html>

