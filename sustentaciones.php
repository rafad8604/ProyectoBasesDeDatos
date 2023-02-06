<?php
 error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_USER_WARNING ^ E_USER_NOTICE ^ E_STRICT ^ E_DEPRECATED ^ E_USER_DEPRECATED ^ E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR);


?><!DOCTYPE html>
<html lang="en">
<head>
    <!-- Conexion con la base de datos -->

    <?php
    require_once "connection.php";
    ?>

    <!-- Conexion con la hoja de estilos -->

    <link rel="stylesheet" href="css/inicio.css">

    <!-- Conexion con Sweet Alert -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Conexion con icons Awesome Fonts -->

    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>

    <script src="../../main.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unillanos - DashBoard</title>
</head>
<body>
    
<div class="contenedor">

    <aside>

       
<div class="aside-logo">
        <img src="images/logounillanos.png" alt="">
</div>

<div class="line"></div>

<div class="dashboard">

    <a href="inicio.php">
    <i class="fa-solid fa-house"></i>
    <b>DASHBOARD</b>
    </a>

</div>

<div class="line"></div>

<div class="aside-interface"><b>INTERFACE</b></div>

<div class="aside-componentes">
    
    <ul>
        <li>
            <a href="estudiantes.php">
            <i class="fa-solid fa-graduation-cap"></i>
            ESTUDIANTES
            </a> 
        </li>
        
        <br>

        <li>
            <a href="jurados.php">
            <i class="fa-solid fa-puzzle-piece"></i>
            JURADOS
            </a> 
        </li>

        <br>

        <li>
            <a href="directivos.php">
            <i class="fa-solid fa-chalkboard-user"></i>
            DIRECTORES
            </a> 
        </li>

        <br>

        <li>
            <a href="recintos.php">
            <i class="fa-solid fa-house"></i>
            RECINTOS
            </a> 
        </li>

    </ul>

</div>

<div class="line-two"></div>

<div class="aside-interface"><b>PROYECTOS DE GRADO</b></div>

<div class="aside-componentes">

<ul>
<li>
    <a href="propuestas.php">
    <i class="fa-solid fa-file-pen"></i>
    PROPUESTAS
    </a> 
</li>

<br>

<li>
    <a href="proyectos.php">
    <i class="fa-solid fa-feather"></i>
    PROYECTOS
    </a> 
</li>

<br>

<li>
    <a  style="font-weight:bold;" href="sustentaciones.php">
    <i style="color:white" class="fa-regular fa-comments"></i>
    SUSTENTACIONES 
    </a> 
</li>

</ul>

</div>


        
    </aside>

    <header>
    <div class="header-title">

<div class="botondd">

    <div class="split-button">

    <button></button>

    <button onclick="toggleDropdown()">

        <span id="chevron">
        <img style="opacity:0.5" src="images/profile.png" alt="" srcset="">
        </span>

    </button>

    <div id="menudd" class="menudd">
             
    <button onclick="handleMenuButtonClicked()">
    
        <span class="material-symbols-outlined"> lock </span>
        Cerrar Sesión
        </button>

    </div>

</div>

</div>


</div>

    </header>
    <main>
        
    <div class="table-contenido">

    
        <table class="table-template-sustentaciones">
            <thead>
                <tr class="header-table">
                    <th colspan="6">HISTORIAL</th>
                </tr>
                <tr class="header-table-row">
                    <th>Nombre Estudiante</th>
                    <th>Nombre Proyecto</th>
                    <th>Nombre Jurado</th>
                    <th>Nombre Director</th> 
                    <th>Veredicto</th>
                    <th>Razon</th>
                </tr>
            </thead>
            <tbody>
            <?php

        $sql = "SELECT nombre_estudiante, nombre_jurado, nombre_director, nombre_proyecto, veredicto, porque FROM historial";
        $query = pg_query($sql);


        if(pg_num_rows($query)>0){
        while($row=pg_fetch_object($query)){  ?>

    <tr>
        <!-- NOMBRE DE LOS ESTUDIANTES -->
        <td>
            
            <?php echo $row->nombre_estudiante ?>

        </td>

        <!-- NOMBRE PROYECTO -->

        <td>
            
        <?php echo $row->nombre_proyecto ?>
    
        </td>

        <!-- NOMBRE JURADO -->

        <td>
            
        <?php echo $row->nombre_jurado?>
    
        </td>
        
        <!-- NOMBRE DIRECTOR -->
    
        <td>
            
        <?php echo $row->nombre_director ?>
    
        </td>
      
        <!-- VEREDCITO -->

        <td> 
            
        <?php echo $row->veredicto ?>
    
        </td>
        
        <td id="razon"> 
            
        <?php echo $row->porque ?>
    
        </td>
    </tr>

<?php }} ?>
            </tbody>
        </table>

    </div>

    </main>

</div> 
  
   
 <script src="dropdown.js"></script>
</body>
</html>
