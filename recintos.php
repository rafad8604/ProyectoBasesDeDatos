<!DOCTYPE html>
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

    <!-- Conexion con los scripts -->

 
 

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0"
    /> 
    
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
                    <a style="font-weight:bold;" href="#">
                    <i style="color:white;" class="fa-solid fa-house"></i>
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
            <a href="sustentaciones.php">
            <i class="fa-regular fa-comments"></i>
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

    
    <div class="boton-crear-alumno">
        <button id="btn-abrir-modal" class="btn-create-alumno">Crear Recinto</button>
    </div>

    <!-- AGREGAR ESTUDIANTES -->

    <dialog id="modal" class="modal-estilo">

        <div class="numberCircle">
            <img src="images/casa.png" alt="" srcset="">
        </div>

        <div class="contenido-modal">

        <div class="title-modal">
            <div id="btn-cerrar-modal"><i class="fa-solid fa-xmark"></i></div>
        </div>

            <form class="formulario" action="insertarRec.php" method="post">

            <input class="enjoy-css" type="text" required name="nomb_rec" placeholder="Nombre">
            <input class="enjoy-css" type="text" required name="dir_rec" placeholder="Direccion">

            <input class="sign-in-btn" type="submit" value="Crear">
            </form>

        </div>
       
    </dialog>

     <!-- ASIGNAR RECINTOS -->

    <dialog id="modal-ver-recinto" class="modal-estilo"> 

    </dialog>

    
    <div class="table-contenido">
        <table class="table-template">
            <thead>
                <tr  >
                    <th colspan="4">RECINTOS</th>
                </tr>
                
                <tr class="header-table-row">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th style="width:10%">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT cod_rec, nomb_rec, dir_rec FROM recintos";
                $query = pg_query($conect, $sql);

                if(pg_num_rows($query)>0){
                while($row=pg_fetch_object($query)){
                ?>
                <tr>
                    <td><?php echo $row->cod_rec?></td>
                    <td><?php echo $row->nomb_rec?></td>
                    <td><?php echo $row->dir_rec?></td>
                  
                    <td class="table-icons-enlace">
                        <a class="ver-recinto" value="<?php echo $row->cod_rec ?>">
                            <i  value="<?php echo $row->cod_est ?>" class="fa-solid fa-pen"></i>
                        </a>
                        <a class="btn-abrir-modal-delete" href="borrarEst.php?id=<?php echo $row->cod_rec ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
                }}
                ?>
            </tbody>
        </table>

    </div>
   
    
    </main>

 
</div> 
  
   
<script src="main.js"></script>
<script src="modal-proyectos.js"></script>
</body>
</html>