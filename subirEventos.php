<?php
include 'conexion.php';
	
// Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Realizar la conexión a la base de datos
        $conectar;

        // Verificar si la conexión fue exitosa
        if (mysqli_connect_errno()) {
            echo "Error al conectar a la base de datos: " . mysqli_connect_error();
            exit();
        }

        // Obtener los valores del formulario
        $titulo = $_POST["titulo"];
        $Contenido = $_POST["contenido"];
        $estado = $_POST["estado"];
        

       
        // Procesar la miniatura
        $mini = str_replace(" ","_",$_FILES["imagen"]["name"]);
        $tipoArchivo = $_FILES["imagen"]["type"];
        $tamanoArchivo = $_FILES["imagen"]["size"];
        $rutaTemporal = str_replace(" ","_",$_FILES["imagen"]["tmp_name"]);

        // Procesar la banner
        $ban = str_replace(" ","_",$_FILES["img"]["name"]);
        $tipoArchivo = $_FILES["img"]["type"];
        $tamanoArchivo = $_FILES["img"]["size"];
        $ruta = str_replace(" ","_",$_FILES["img"]["tmp_name"]);

        // Guardar la miniatura en una ubicación específica
        $rutamini = "img/" . $mini;
        $rutaban= "img/" . $ban;
        move_uploaded_file($rutaTemporal, $rutamini);
        move_uploaded_file($ruta, $rutaban);

        

        // Guardar el banner en una ubicación específica
        

        // Insertar los datos en la base de datos
        $query = "INSERT INTO eventos (titulo, contenido, estado, miniatura, banner ) VALUES ('$titulo', '$Contenido', '$estado',  '$rutamini', '$rutaban')";

        if (mysqli_query($conectar, $query)) {
     
        
      
            
            
           } else {
               echo "Error al guardar los datos: " . mysqli_error($conectar);
           
           }
        
        mysqli_close($conectar);
        
        
    }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/minifav.png">
    <title>Evento</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type= "text/css" href ="evento.css">
    
    <!-- Para el estilo de descripcion -->
    <link rel="stylesheet" href="siteText.css">
    <link rel="stylesheet" href="richtext.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.richtext.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!-- Agrega el enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
           <!-- Agrega el enlace a Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<header class="headers">
    
      <a href="listado_eventos.php" class="button">Lista de Eventos</a>
    </div>
</header>



<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
    <label for="btn-menu"> &#10005; </label>
		<nav>
			<a href="admin/index.php">Inicio Panel Usuario</a>
		
			
		</nav>
		
	</div>
</div>

<body>

    <h1 class="fw-300 centrar-texto">Sube tu entrada</h1>
    

    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">
   
      </div>
        </h2>

        <form class="evento" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Evento</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" placeholder="Coloca un titulo">

                <label for="imagen" >Sube tu descripcion</label>
                <div class="container">
                <section class="formularioProyecto aling-items-stretch">
                <div class="container-fluid">
                    <br>
  
                    <!-- Apartado para editor te texto -->
                 
                    <div class="page-wrapper box-content">
                    <textarea class="content" name="contenido"></textarea>
                    </div>
                    <script>
                     $(document).ready(function() {
                    $('.content').richText();
                        });
                    </script>

                    <br></br>

                <label for="estado">Selecciona tu estado: </label>
                <select name="estado" required>
                    <option value="" disabled selected>-- Seleccione --</option>
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

                <label for="imagen">Sube tu miniatura "solo imagenes PNG, JPG"</label>
                <input class="boton" type="file" name="imagen" placeholder="Sube tu imagen" required>



                <label for="img">Sube tu banner "solo imagenes PNG, JPG"</label>
                <input class="boton" type="file" name="img" placeholder="Sube tu imagen" required>

            </fieldset>
            <input type="submit" value="Subir" id="subir" class="boton boton-verde" >
            <br></br>

            <?php
            if ($_POST) {
	        if ("subir") echo '<script type="text/javascript">
             alert("Se han subido los cambios correctamente");
            window.location.assign("listado_eventos.php");
            </script>';
            }
            ?>



           
          



        </form>
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="#">Quiénes somos</a>
                <a href="#">Contacto</a>
            </nav>
            <p class="copyright">Todos los Derechos Reservados 2023 &copy; </p>
        </div>
    </footer>
</body>
</html>