<?php


include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT nomb_rec, dir_rec FROM recintos WHERE cod_rec='$codigo'";
$query = pg_query($sql);
$rowd = pg_fetch_object($query);



?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../../public/css/inicio.css">
        
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
          <a href="recintos.php"> <div id="btn-cerrar-modal"><i class="fa-solid fa-xmark"></i></div></a> 
        </div>

        <form class="formulario "action="updateRec.php" method="POST">

        <input value="<?php echo $codigo ?>" type="hidden" name="codigo">

        <input class="enjoy-css" type="text" name="nombres" placeholder="Nombre" value="<?php echo $rowd->nomb_rec ?>">
        <input class="enjoy-css" type="text" name="Direccion" placeholder="Direccion" value="<?php echo $rowd->dir_rec ?>">

        <input class="sign-in-btn" type="submit" value="Editar">


        </form>

        </div>

</div>

</dialog>

</body>
</html>