
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type= "text/css" href ="style.css">   
 
 <center>       <title>Menu principal</title>

</head>
    
<header class="header">
	<div class="container">
		<div class="btn-menu">
            <!-- En el index.html -->
<label id="milabel" class="menu-icon-index" for="btn-menu"><i class="fas fa-bars"></i></label>
		</div>
		<div class="logo">
			<a href="index.php">
				
			</a>
			<h1>Menu principal</h1>
		</div>
	</div>
</header>



<div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
    <label for="btn-menu"> &#10005; </label>
		
	</div>
</div>



<body>
<div class="barra">
      
  <div  style="visibility:hidden">Gestión de sesiones </div>
     
  </div>
      
     
  
  <div class="bienvenido">
      <p>Por favor seleccione una de las opciones del menú.</p>
  </div>
  
    
  
    
  
  
  
  
        
  <!--- -SECCION DEL FONDO EN MOVIMIENTO--->  
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <?php include 'menu-superior.php'; ?>
  
          
  
  
  
  
          
<!---      Bootstrap core JavaScript
      ================================================== ---->
      <script src="js/jquery-1.7.2.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="js/signin.js"></script> 
  

</body>

<br><br><br>
<footer class="site-footer seccion"> 
        <div class="contenedor contenedor-footer">
           
        </div>
    </footer>

    
</html>
