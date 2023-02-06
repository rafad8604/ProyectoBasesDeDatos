<?php
include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


$codigo =$_POST['codigo'];
$fecha =$_POST['fecha'];

$sql = "SELECT veredicto FROM sustentaciones WHERE cod_proye='$codigo'";
$query = pg_query($sql);
$vacio = pg_fetch_result($query, 0, 0);

if(empty($vacio)){

 
  $sqlFechaPre = "SELECT fecha_pro FROM proyectos WHERE cod_proye='$codigo'";
  $queryFechaPre = pg_query($sqlFechaPre);

  $fechaTimestamp = strtotime($fecha);
  $fechaPre = pg_fetch_result($queryFechaPre, 0, 0);
  $fechaPreTimestamp = strtotime($fechaPre);

  //fechaTimesTamp es la fecha que para exposicion
  //FechaPreTimestamp es la fecha en que se creo la propuestas

  if ($fechaTimestamp >= $fechaPreTimestamp) {

    $sql="UPDATE sustentaciones SET fecha_pre='$fecha' WHERE cod_proye='$codigo'";
    $query = pg_query($sql);


    include_once  "proyectos.php";
    echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se asigno una fecha de exposicion",
      });</script>';

  } else {

     include_once  "proyectos.php";
     echo '<script> Swal.fire({
        icon: "error",
        title: "Error",
         text: "La fecha de exposicion no puede ser menor a la fecha de creacion",
     });</script>';

  } 


}else{

include_once  "proyectos.php";
echo '<script> Swal.fire({
  icon: "error",
   title: "Error",
   text: "No se puede actualizar un proyecto que ya le fue dado un veredicto",
 });</script>';

}

