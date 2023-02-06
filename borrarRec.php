
<?php

include("connection.php");
session_start();


$codigo=$_GET['id'];

$sql = "SELECT count(*) FROM sustentaciones where cod_rec='$codigo'";
$query = pg_query($sql);
$consulta = pg_fetch_result($query, 0, 0);



if($consulta >= 1){
  
  include_once  "recintos.php";
          echo '<script> Swal.fire({
              icon: "error",
              title: "Error",
              text: "El recinto no puede ser eliminado",
            });</script>';
}else{
  $sql = "DELETE FROM recintos WHERE cod_rec='$codigo'";
  $query = pg_query($sql);  
   
  if($query){
  
      include_once  "recintos.php";
      echo '<script> Swal.fire({
        icon: "success",
        title: "Buen trabajo!",
        text: "Se borro manera correcta el recinto",
      });</script>';
      
            

  
          }else{
            include_once  "recintos.php";
            echo '<script> Swal.fire({
                icon: "error",
                title: "Error al borrar el recinto",
              });</script>';
          }
  
}

?>
