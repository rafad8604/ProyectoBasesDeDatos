<?php
include("connection.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


$codigo=$_POST['codigo'];
$veredicto=$_POST['veredicto'];
$razon = $_POST['razon'];

$sql = "SELECT veredicto FROM sustentaciones WHERE cod_proye='$codigo'";
$query = pg_query($sql);
$query = pg_fetch_result($query, 0, 0);

if(empty($query)){

  $sqldos = "SELECT cod_rec FROM sustentaciones WHERE cod_proye= '$codigo'";
  $querydos = pg_query($sqldos);
  $querydos = pg_fetch_result($querydos, 0, 0);

    if(empty($querydos)){

      include_once  "proyectos.php";
      echo '<script> Swal.fire({
        icon: "error",
         title: "Error",
         text: "se necesita un recinto antes de darle un veredicto",
       });</script>'; 

    }else{

      $sqltres = "SELECT fecha_pre FROM sustentaciones WHERE cod_proye= '$codigo'";
      $querytres = pg_query($sqltres);
      $querytres = pg_fetch_result($querytres, 0, 0);

      if(empty($querytres)){

        include_once  "proyectos.php";
        echo '<script> Swal.fire({
          icon: "error",
           title: "Error",
           text: "se necesita una fecha de presentacion antes de darle un veredicto",
         });</script>'; 

      }else{

        $sqlcuatro ="UPDATE sustentaciones SET veredicto='$veredicto', razon='$razon' WHERE cod_proye='$codigo'";
        $querycuatro = pg_query($sqlcuatro); 

        // PASAR LOS DATOS DE ACA A HISTORIAL

            // PROYECTO

            $sqlProyecto = "SELECT nomb_proye FROM proyectos WHERE cod_proye='$codigo'";
            $queryProyecto = pg_query($sqlProyecto);
            $Proyecto = pg_fetch_result($queryProyecto, 0, 0);

            // JURADO

            $sqlCodJurado = "SELECT cod_jur FROM sustentaciones WHERE cod_proye = '$codigo'";
            $queryCodJurado = pg_query($sqlCodJurado);
            $Cod_Jur = pg_fetch_result($queryCodJurado, 0, 0);

            $sqlJurado = "SELECT nomb_jur FROM jurados WHERE cod_jur='$Cod_Jur'";
            $queryJurado = pg_query($sqlJurado);
            $Jurado = pg_fetch_result($queryJurado, 0, 0);

            // DIRECTOR

            $sqlCodDirector = "SELECT cod_dir FROM proyectos WHERE cod_proye='$codigo'";
            $queryCodDirector = pg_query($sqlCodDirector);
            $Cod_Dir = pg_fetch_result($queryCodDirector, 0, 0);

            $sqlDirector = "SELECT nomb_dir FROM directores WHERE cod_dir='$Cod_Dir'";
            $queryDirector = pg_query($sqlDirector);
            $Director = pg_fetch_result($queryDirector, 0, 0);

            // VEREDICTO

            $sqlVeredicto = "SELECT veredicto FROM sustentaciones WHERE cod_proye = '$codigo'";
            $queryVeredicto = pg_query($sqlVeredicto);
            $Veredicto = pg_fetch_result($queryVeredicto, 0, 0);

            // RAZON

            $sqlRazon = "SELECT razon FROM sustentaciones WHERE cod_proye = '$codigo'";
            $queryRazon = pg_query($sqlRazon);
            $Razon = pg_fetch_result($queryRazon, 0, 0);

            // ESTUDIANTE
            
            $sqlEstudiante = "SELECT nomb_est FROM estudiantes WHERE cod_proye = '$codigo'";
            $queryEstudiante = pg_query($sqlEstudiante);
            $vectorEstudiante = pg_fetch_all($queryEstudiante);
  
            // ENVIO DE LOS DATOS

            foreach ($vectorEstudiante as $estudiante) {
            $nombre = $estudiante["nomb_est"];
            $inserto = "INSERT INTO historial VALUES ('$nombre','$Jurado','$Director','$Proyecto','$Veredicto','$Razon')";
            pg_query($inserto);
            }

            //

              include_once  "proyectos.php";
              echo '<script> Swal.fire({
                  icon: "success",
                  title: "Buen trabajo!",
                  text: "Se establecio el veredicto para este proyecto",
                });</script>';
       
             
      }

      

    }
   
}else{

    include_once  "proyectos.php";
    echo '<script> Swal.fire({
      icon: "error",
       title: "Error",
       text: "Error este proyecto ya le fue dado un veredicto",
     });</script>'; 
}

