<?php

include("connection.php");
session_start();

$codigo = $_GET['id'];
$sql="SELECT cod_proye, nomb_proye, fecha_pro, descripcion FROM proyectos  WHERE cod_proye='$codigo'";
$query = pg_query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="css/inicio.css">
        <script src="prueba.js"></script>
        
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

<?php   if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){   ?>

<div class="hola">
<table class="table-modal">
    <tr>
                <td style=" font-weight:bold" class="table-modal-crud">Codigo</td>
                <td style=" font-weight:bold" class="table-modal-crud">Nombre</td>
                <td style=" font-weight:bold" class="table-modal-crud">Fecha</td>
                <td style=" font-weight:bold" class="table-modal-crud">Descripcion</td>
        </tr>
    <tbody>
        <td class="table-modal-crud"><?php echo $row->cod_proye ?></td>   
        <td class="table-modal-crud"><?php echo $row->nomb_proye ?></td>
        <td class="table-modal-crud"><?php echo $row->fecha_pro ?></td>
        <td class="table-modal-crud"><?php echo $row->descripcion ?></td>
    </tbody>
    
        <?php }} ?>
</table>

</div>




</div>

</dialog>


</body>
</html>

