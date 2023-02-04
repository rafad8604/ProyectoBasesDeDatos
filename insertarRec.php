<?php

include("connection.php");

session_start();

$nombre=$_POST['nomb_rec'];
$direccion=$_POST['dir_rec'];

// error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


//COMPROBAR SI EL DNI ESTA REPETIDO EN LAS TABLAS ESTUDIANTES, JURADOS O DIRECTIVOS

$sql="INSERT INTO recintos(cod_rec, nomb_rec, dir_rec) values ('rec' || nextval('recintos_codigo_seq'), '$nombre', '$direccion')";
$query = pg_query($sql);

  if($query){
      
    include_once  "recintos.php";
      echo '<script> Swal.fire({
          icon: "success",
          title: "Buen trabajo!",
          text: "Se ha registrado un nuevo recinto",
        });</script>';
     
  
  }else{
      
    include_once  "recintos.php";
      echo '<script> Swal.fire({
          icon: "error",
          title: "Error al ingresar re recinto",
        });</script>';
  }

?>




   