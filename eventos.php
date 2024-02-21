<?php
include 'conexion.php';
	
	//$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	
     // Consulta SQL para obtener los datos de las entradas
     $sql = "SELECT  * FROM eventos ORDER BY id DESC ";

     // Ejecutar la consulta
     $result=mysqli_query($conectar,$sql);
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/minifav.png">
    <title>Proyectos</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
          <!-- Agrega el enlace a Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
</head>

<?php include 'header.php'; ?>



<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
    <label for="btn-menu"> &#10005; </label>
		<nav>
			<a href="index.php">Inicio</a>
		</nav>
		
	</div>
</div>

<body> 



    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Últimos Eventos</h2>
        <br>
        <div class="contenedor-anuncios">
        <?php 

        while($mostrar=mysqli_fetch_array($result)){
            //Esta parte es para limitar los caracteres en la prevía
            $palabras = explode(" ", $mostrar ['contenido'] ); // Dividir el texto en palabras
            $numPalabras = 30; // Número de palabras que se mostrarán
            
            $contenidoLimitado = implode(" ", array_slice($palabras, 0, $numPalabras)); // Unir las primeras palabras nuevamente
            
         ?>
       
            <div class="anuncio">
                <img src="<?php echo $mostrar ['banner'];  ?> " alt="Imagen noticia">
                <div class="contenido-anuncio">
                    <h3> <?php echo $mostrar ['titulo']; ?> </h3>
                    <p><?php echo $contenidoLimitado  ?> </p>
                    <p class="precio"><?php echo $mostrar ['estado']; ?> </p>
                    <form action="evento.php" method="GET">
                      <input type="hidden" name="id" value="<?php echo $mostrar ['id']; ?>">
                      <button class="boton boton-amarillo d-block" type="submit">Leer árticulo</button>
                    </form>
                </div>
            </div>    
            <?php 
		    }
		    ?>
        </div>
        
		
    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
           
        </div>
    </footer>
</body>
</html>