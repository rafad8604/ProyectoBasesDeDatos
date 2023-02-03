<?php

 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);

include("connection.php");
session_start();

$cod_jurado=$_GET['id'];

$sqlfirst = "SELECT count(*) from jurados where cod_jur='$cod_jurado' and cod_jur in(select cod_jur from sustentaciones)";
$queryfirst = pg_query($sqlfirst);
$acumuladofirst = pg_fetch_result($queryfirst, 0, 0);


$sql = "SELECT veredicto FROM sustentaciones WHERE cod_jur='$cod_jurado'";
$query = pg_query($sql);
$consulta = pg_fetch_result($query, 0, 0);

if($consulta == "SI" || $consulta == "NO"){
  $acumuladofirst += 1;
}

if($acumuladofirst == 0 || $acumuladofirst == 2){

   $deleteJur = "DELETE FROM jurados WHERE cod_jur='$cod_jurado'";
   $deleteJur = pg_query($deleteJur);  
  
  if($deleteJur){
 
   include_once  "jurados.php";
   echo '<script> Swal.fire({
   icon: "success",
    title: "Buen trabajo!",
    text: "Se borro manera correcta el jurado",
    });</script>';
     
  }else{
    include_once  "jurados.php";
      echo '<script> Swal.fire({
       icon: "error",
       title: "Error!",
      text: "No se puede eliminar el jurado",
       });</script>';
     }

  }else{
    include_once  "jurados.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error!",
      text: "Este jurado no puede ser eliminado hasta dar un veredicto",
     });</script>';
}

?>
