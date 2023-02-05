<?php

include("connection.php");
session_start();

$cod_proye=$_GET['id'];

        
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Conexion con la base de datos -->

    <?php
    require_once "connection.php";
    ?>

    <!-- Conexion con la hoja de estilos -->

    <link rel="stylesheet" href="../../public/css/inicio.css">

    <!-- Conexion con Sweet Alert -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Conexion con icons Awesome Fonts -->

    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unillanos - DashBoard</title>
</head>
<body>

<div class="numberCircle">
            <img src="images/casa.png" alt="" srcset="">
        </div>

        <div class="contenido-modal">

        <div class="title-modal">
           <a href="proyectos.php"> <div id="btn-cerrar-modal"><i class="fa-solid fa-xmark"></i></div></a>
        </div>


    <form action="asignarRec.php" method="POST">

    <select class="select" name="agregarRec" id="form-propuestas">
        <option>---------Selecione un recinto----------</option> 
        <?php
                                        $sql="SELECT cod_rec, nomb_rec, dir_rec FROM recintos";
                                        $query=pg_query($sql);
                                        while($row = pg_fetch_array($query)){
                                        echo '<option value="'.$row['cod_rec'].'">'.$row['nomb_rec'].'   '.$row['dir_rec'].' '.'</option>';
                                            
                                    }
                                    ?>
    </select>  
    <input type="hidden" name="cod_proye" value="<?php echo $cod_proye=$_GET['id'];?>">
    <input class="btn-submit" type="submit" value="Asignar">                                  
    </form>
    
       </div>
 
</body>
</html>