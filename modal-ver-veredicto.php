<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];


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
            <img src="images/mazo.png" alt="" srcset="">
        </div>

<div class="contenedor-modal">

<div class="title-modal">
        <a href="proyectos.php">    <div id="btn-cerrar-modal"><i class="fa-solid fa-xmark"></i></div></a>
        </div>

        <form action="updateVeredicto.php" method="POST">

    
        <input type="hidden" name="codigo" value="<?php echo $codigo ?>">
   
        <div class="wrapper">

        <input  type="radio" name="veredicto" id="option-1" required value="SI" checked>
        <input  type="radio" name="veredicto" id="option-2" required value="NO">  

        <label for="option-1" class="option option-1">

                <div class="dot"></div>

        <span>Aprobar</span>

        </label>

                <label for="option-2" class="option option-2">

                        <div class="dot"></div>

                <span>Rechazar</span>

        </label>

        </div>
    
        <div class="text-veredicto">

        <textarea name="razon" class="input-date" required></textarea>

        </div>

    <input class="btn-submit" type="submit" value="Calificar">
    </form>


</div>

</dialog>


</body>
</html>
