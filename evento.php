<?php
include 'conexion.php';
	
	//$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	
     // Consulta SQL para obtener los datos de las entradas
     $sql = "SELECT  titulo, contenido, estado, miniatura, banner FROM eventos";

 
     $proyecto_id = $_GET['id']; // Recupera el ID del proyecto desde la URL

    $sql = "SELECT * FROM eventos WHERE id = $proyecto_id";
    $result = $conectar->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row["titulo"];
        $contenido = $row["contenido"];
        $estado = $row["estado"];
        $miniatura = $row["miniatura"];
        $banner = $row["banner"];
        $id = $row["id"];
    } else {
        echo "No se encontró el proyecto";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/minifav.png">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>






<body>
<?php include 'header.php'; ?>

<br>  <br>  <br>  <br>  <br>
    <div class="centrar-texto">
        <h2 class="fw-300 centrar-texto"><?php echo $titulo  ?> </h2>
        <br>  <br>  
        <img width="500px" src="<?php echo $banner ?> " alt="Imagen Anuncio">
    </div>
    

    <main class="contenedor seccion contenido-centrado">
        <div class="resumen-propiedad">
            <p class="precio"><?php echo $estado  ?> </p>
           
        </div>

        <p><?php echo nl2br($contenido);  ?> </p>

        <br></br>
     
                    
    </main>

    
    <br></br><br></br>
    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
        
        </div>
    </footer>
</body>
</html>