<?php
include("connection.php");
session_start();

$codigo_rec = $_POST['agregarRec'];
$codigo_proye = $_POST['cod_proye'];


$sql = "SELECT veredicto FROM sustentaciones WHERE cod_proye='$codigo_proye'";
$query = pg_query($sql);  
$query = pg_fetch_result($query, 0, 0);

if($query == "SI" || $query == "NO"){
  include_once  "proyectos.php";
  echo '<script> Swal.fire({
    icon: "error",
    title: "Error!",
    text: "El proyecto ya le fue dado un veredicto",
  });</script>';

}else{

  $sql = "UPDATE sustentaciones SET cod_rec='$codigo_rec' WHERE cod_proye = '$codigo_proye'";
  $query = pg_query($sql);  
  
  if($query){

    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "success",
      title: "Buen trabajo!",
      text: "Se asigno de manera correcta el recinto",
    });</script>';
    
          
       


        }else{
          include_once  "proyectos.php";
          echo '<script> Swal.fire({
              icon: "error",
              title: "Hubo un error al asignar el recinto",
            });</script>';
        }


}




?>
