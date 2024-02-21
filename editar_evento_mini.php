<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/minifav.png">
    <title>Editar Miniatura</title>
    <!-- Estilos de la página -->
    <link rel="stylesheet" type= "text/css" href ="evento.css">
    <link rel="stylesheet" href="stylesss.css">
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
           
            $nuevaImagen_mini = $row['nueva_imagen_mini']; // Obtener el nombre de la imagen actual

            // Para banner
// Para miniatura

            // Para miniatura

            if (!empty($_FILES['nueva_imagen_mini']['tmp_name'])) {
                $rutaImagenTemporal_mini = $_FILES['nueva_imagen_mini']['tmp_name'];
                $nuevaImagen_mini = str_replace(" ","_",$_FILES['nueva_imagen_mini']['name']);
            
                // Si la ruta no comienza con "img/", agregar "img/"
                if (strpos($nuevaImagen_mini, 'img/') === false) {
                    $nuevaImagen_mini = "img/" . $nuevaImagen_mini;
                }
            
                $rutaImagenDestino_mini = $nuevaImagen_mini;
                move_uploaded_file($rutaImagenTemporal_mini, $rutaImagenDestino_mini);
            } else {
                // Si la ruta actual comienza con "img/", mantenerla
                if (strpos($imagen_actual_mini, 'img/') === 0) {
                    $nuevaImagen_mini = $imagen_actual_mini;
                } else {
                    $nuevaImagen_mini = "img/" . $imagen_actual_mini;
                }
            }


            // Realizar la actualización en la base de datos
            $updateQuery = "UPDATE eventos SET  miniatura = '$nuevaImagen_mini' WHERE id = $id";
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
            $imagen_actual_mini = $row['miniatura'];

            ?>
<body>
   
    <h1 class="fw-300 centrar-texto">Edita tu Proyecto</h1>
    

    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">
   
      </div>
        </h2>

        <form class="evento"  method="POST" enctype="multipart/form-data">
        <label for="miniatura">Miniatura actual</label> 
        <br></br>
        
        <center><img src= <?php echo $imagen_actual_mini  ?> alt='Imagen' width='50%'></center>`
        <br></br>
                <label for="miniatura">Sube tu imagen "Resolucion recomendable 1920 * 300"</label>
                <input class="boton boton-verde" type="file" name="nueva_imagen_mini" placeholder= "Sube tu imagen">

                <input type="submit" value="Subir" class="boton boton-rojo">

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

    

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
          
        </div>
    </footer>
</body>
</html>