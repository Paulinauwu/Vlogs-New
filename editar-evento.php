<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/minifav.png">
    <title>Editar proyecto</title>
    <link rel="stylesheet" href="stylesss.css">
    <link rel="stylesheet" type= "text/css" href ="evento.css">
    <!-- Estilos de la página -->
    <link rel="stylesheet" href="siteText.css">
    <link rel="stylesheet" href="richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.richtext.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!-- Agrega el enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
</head>
<header class="headers">
    <div class="logo-container">
    </div>
    <div class="header-content">
      </div>
      <div class="button-container">
      <a href="listado_eventos.php" class="button">Lista de Eventos</a>
    </div>
</header>

  <?php
    include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Aquí puedes obtener los datos del formulario editado
            $nuevoTitulo = $_POST['nuevo_titulo'];
            $nuevoEstado = $_POST['nuevo_estado'];
            $nuevoContenido = $_POST['nuevo_contenido'];
           

            


            // Realizar la actualización en la base de datos
            $updateQuery = "UPDATE eventos SET titulo = '$nuevoTitulo', contenido = '$nuevoContenido', estado = '$nuevoEstado' WHERE id = $id";
            $resultado = mysqli_query($conectar, $updateQuery);

            if ($resultado) {
                header("Location: listado_eventos.php"); // Redirige a la página al listado de proyectos
                exit(); // Termina la ejecución del script después de la redirección
            } else {
                echo "<p>Error al guardar los cambios.</p>";
            }
        }

        $selectQuery = "SELECT * FROM eventos WHERE id = $id";
        $result = mysqli_query($conectar, $selectQuery);

        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $titulo = $row['titulo'];
            $contenido = $row['contenido'];
            $estado = $row['estado'];

            ?>
<body>
   
    <h2 class="fw-300 centrar-texto">Edita tu Proyecto</h2>
    

    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">
   
      </div>
        </h2>

        <form class="evento"  method="POST" enctype="multipart/form-data">
            
                <label for="titulo">Titulo:</label>
                
                <input type='text' name='nuevo_titulo' value="<?php echo $titulo?>">
                
                


                <label for="estado">Estado</label>
                            <select name="nuevo_estado" id="nuevo_estado">
                                <option value="<?php echo $estado ?>"> <?php echo $estado ?></option>
                                <option value="Aguascalientes">Aguascalientes</option>
                                <option value="Baja California">Baja California</option>
                                <option value="Baja California Sur">Baja California Sur</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Chiapas">Chiapas</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="CDMX">Ciudad de México</option>
                                <option value="Coahuila">Coahuila</option>
                                <option value="Colima">Colima</option>
                                <option value="Durango">Durango</option>
                                <option value="Estado de México">Estado de México</option>
                                <option value="Guanajuato">Guanajuato</option>
                                <option value="Guerrero">Guerrero</option>
                                <option value="Hidalgo">Hidalgo</option>
                                <option value="Jalisco">Jalisco</option>
                                <option value="Michoacán">Michoacán</option>
                                <option value="Morelos">Morelos</option>
                                <option value="Nayarit">Nayarit</option>
                                <option value="Nuevo León">Nuevo León</option>
                                <option value="Oaxaca">Oaxaca</option>
                                <option value="Puebla">Puebla</option>
                                <option value="Querétaro">Querétaro</option>
                                <option value="Quintana Roo">Quintana Roo</option>
                                <option value="San Luis Potosí">San Luis Potosí</option>
                                <option value="Sinaloa">Sinaloa</option>
                                <option value="Sonora">Sonora</option>
                                <option value="Tabasco">Tabasco</option>
                                <option value="Tamaulipas">Tamaulipas</option>
                                <option value="Tlaxcala">Tlaxcala</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="Yucatán">Yucatán</option>
                                <option value="Zacatecas">Zacatecas</option>
                            </select>



                <label for="imagen" >Sube tu descripcion</label>
                <div class="container">
                <section class="formularioProyecto aling-items-stretch">
                <div class="container-fluid">
                    <br>
  
                    <!-- Apartado para editor te texto -->
                 
                    <div class="page-wrapper box-content">
                    <textarea class="content" name="nuevo_contenido"><?php echo $contenido?></textarea>
                    </div>
                    <script>
                     $(document).ready(function() {
                    $('.content').richText();
                        });
                    </script>
                 


                    


                <label for="imagen" >Cambia tu banner </label>
               <?php
                echo "<a href='editar_evento_banner.php?id=$id'><img src='img/editarr.png' alt='Editar' class='edit-icon'></a>";
                ?>
               
               <label for="imagen" >Cambia tu miniatura </label>
               <?php
                echo "<a href='editar_evento_mini.php?id=$id'><img src='img/editarr.png'' alt='Editar' class='edit-icon'></a>";
                ?>
            <br></br>
        
            <input type="submit" value="Subir" class="boton boton-rojo">

            <button></button>

            <br></br>
            
        </form>

  
    </main>
        <?php
  } else {
            echo "<p>El proyecto no se encontró.</p>";
        }
    } else {
        echo "<p>No se ha proporcionado un ID válido.</p>";
    }


    ?>

    <script>
    function confirmarEliminar() {
    if (confirm('¿Estás seguro de que deseas eliminar este proyecto? Esta acción no se puede deshacer.')) {
        window.location.href = 'eliminar_proyecto.php?id=<?php echo $id; ?>';
    }
    }

    </script>
    

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            
        </div>
    </footer>
</body>
</html>