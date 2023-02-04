<?php
include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);

$codigo = $_POST['codigo'];
$nombre=$_POST['nombres'];
$direccion=$_POST['Direccion'];

$sql = "UPDATE recintos SET nomb_rec='$nombre', dir_rec = '$direccion' WHERE cod_rec = '$codigo'";
$query = pg_query($sql);


   if($query){
      
       include_once  "recintos.php";
       echo '<script> Swal.fire({
           icon: "success",
           title: "Buen trabajo!",
           text: "Se edito de manera correcta el recinto",
         });</script>';

}else{

    include_once  "recintos.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error",
       text: "Error al editar el recinto",
     });</script>';
 
}



