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
        <link rel="stylesheet" href="css/inicio.css">
      
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>

<dialog open id="modal-editar" class="modal-estilo"> 

<div class="numberCircle">
            <img src="images/view.png" alt="" srcset="">
        </div>

<div class="contenedor-modal">

<div class="title-modal">
        <a href="propuestas.php">    <div id="btn-cerrar-modal"><i class="fa-solid fa-xmark"></i></div></a>
        </div>



        
        <div class="hola">

<table class="table-modal">


        <tr>
                <td style=" font-weight:bold" class="table-modal-crud">Codigo</td>
                <td style=" font-weight:bold" class="table-modal-crud">Dni</td>
                <td style=" font-weight:bold" class="table-modal-crud">Nombre</td>
                <td style=" font-weight:bold" class="table-modal-crud">Apellido</td>
        </tr>


   <tbody>

         <?php   
         
        $sql="SELECT cod_est, dni, nomb_est, ape_est FROM estudiantes WHERE cod_proye='$codigo'";
        $query = pg_query($sql);

        if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){   ?>

        <tr>
                <td class="table-modal-crud"><?php echo $row->cod_est ?></td>  
                <td class="table-modal-crud"><?php echo $row->dni ?></td>
                <td class="table-modal-crud"><?php echo $row->nomb_est ?></td>
                <td class="table-modal-crud"><?php echo $row->ape_est ?></td>
        </tr>

        <?php }} ?>
   </tbody>
   
    
</table>

        </div>





</div>

</dialog>


</body>
</html>

