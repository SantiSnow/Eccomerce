<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Santiago Aguirre">
<title>Bootstrap eCommerce Template</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">

#resultadosBusquedaTitulo{

margin:20px;

}

#imagenBusqueda{

    width: 200px;
    height: 150px;

}

</style>


</head>

<!-- Esto es en localhost www de wamp -->

<body>
<nav>
<div class="container">

<!-- Aca colocamos Brand o logotipo y toggle agrupado para disp mobiles -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<a class="navbar-brand" href="index.php">CompuItuzaingo</a></div>

<!-- Nav links -->
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="busquedaCategorias.php">Categorias</a> </li>
<li><a href="paginaEmpleados.php">Pagina Empleados</a> </li>

</ul>
<!-- Aqui esta el buscador de la pagina para productos -->

<form class="navbar-form navbar-right" role="search" action="resultadoBusqueda" method="get">
<div class="form-group">
<input type="text" class="form-control" name="buscar" placeholder="Buscar">
</div>
<button type="submit" class="btn btn-default">Enviar</button>
</form>

<!-- Fin del buscador -->

<ul class="nav navbar-nav navbar-right hidden-sm">
<li><a href="ListaCompletaDeProductosSinFormato.php" title="Todos los productos">Productos</a> </li>

</ul>
</li>
</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div id="carousel1" class="carousel slide">
<ol class="carousel-indicators">
<li data-target="#carousel1" data-slide-to="0" class="active"> </li>
<li data-target="#carousel1" data-slide-to="1" class=""> </li>
<li data-target="#carousel1" data-slide-to="2" class=""> </li>
</ol>
<div class="carousel-inner">
<div class="item"> <img class="img-responsive" src="images/1920x500.gif" alt="thumb">
<div class="carousel-caption">Lorem ipsum dolor set amet. </div>
</div>
<div class="item active"> <img class="img-responsive" src="images/1920x500.gif" alt="thumb">
<div class="carousel-caption">Lorem ipsum dolor set amet. </div>
</div>
<div class="item"> <img class="img-responsive" src="images/1920x500.gif" alt="thumb">
<div class="carousel-caption">Lorem ipsum dolor set amet. </div>
</div>
</div>
<a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
</div>
</div>
<hr>
</div>
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<div class="row">
<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="images/40X40.gif"></div>
<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
<h4>Envios Gratis</h4>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<div class="row">
<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="images/40X40.gif"></div>
<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
<h4>Devoluciones</h4>
</div>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
<div class="row">
<div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="images/40X40.gif"></div>
<div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
<h4>Mejores Precios</h4>
</div>
</div>
</div>
</div>
</div>
<hr>
<h2 id="resultadosBusquedaTitulo">Resultados de la busqueda:</h2>
<hr>
			<div class="container">
                           
            <?php        
            
            require("conexion.php");

            $consulta = "SELECT * FROM productos WHERE SECCION='PERIFERICOS'";
                
                $conexion = mysqli_connect($dbdirec, $dbusr, $dbpassword, $dbnombre);
                
                mysqli_set_charset($conexion, "utf8");
                
                if(mysqli_connect_errno()){
                    echo "Fallo la conexion con la base de datos";
                    exit();
                }
                
                mysqli_select_db($conexion, $dbnombre)or die ("No se encuentra la base de datos");
                
                /*
                 * para que las funciones y querys acepten utf-8 usamos:
                 * mysqli_set_charset($conexion, "utf8");
                 * el nombre de la conexion a la base y el charset que usemos
                 * 
                 * si el nombre de la base de datos falla:
                 * mysqli_select_db($conexion, $db_nombre)or die ("No se encuentra la base de datos");
                 */
                
                $resultado = mysqli_query($conexion, $consulta);
                
                if($resultado == null){
                
                    echo "No se encontraron productos relacionados.";
                    
                }else{
                    while(($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC))==true){
                        
                        $rutaImg = $fila ['FOTO'];
                        $url = $fila ['URL'];
                        
                            /*
                             * 
                             * importante: siempre utilzar MYSQLI cuando definimos constantes, funciones o clase
                             * predefinidas de php, ya que mysql es un conjunto de metodos obsoletos para php 5 
                             *  y en php7 ya ni siquiera existen
                             *  
                             */
                            
                        
                        echo "<div class='col-md-4'>";
                        echo "<form>";
                        echo "<strong>Producto: </strong>";
                        echo "<br />";
                        echo "<a href='" . $url . "'><img src='images/" . $rutaImg . "' alt='Imagen del producto' class='img-responsive' id='imagenBusqueda'></a>";
                        echo "<br />";
                        echo "Codigo Articulo: " . $fila ['CODIGOARTICULO'];
                        echo "<br />";
                        echo "Nombre Articulo " . $fila ['NOMBREARTICULO'];
                        echo "<br />";
                        echo "Seccion: " . $fila ['SECCION'];
                        echo "<br />";
                        echo "Precio: $" . $fila ['PRECIO'];
                        echo "<br />";
                        if($fila ['STOCK'] > 0){
                            echo "Hay stock del producto: " .$fila ['STOCK'] . " unidades.";
                        }
                        else{
                            echo "No hay stock del producto";
                        }
                        echo "<br />";
                        echo "<br />";
                        echo "</form>";
                        echo "</div>";
                    
                    }
                }
                
                
                mysqli_close($conexion);
                
                ?>
            
                           
                                    
			</div>
<hr>
<h2 class="text-center">Productos Destacados</h2>
<hr>
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-6">
<div class="media-object-default">
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"> </a> </div>
<div class="media-body">
<h4 class="media-heading">Producto</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, vitae doloremque voluptatum doloribus neque assumenda velit sapiente quas aliquam ratione. Sed possimus corporis dolorum optio eaque in asperiores soluta expedita! </div>
</div>
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"> </a> </div>
<div class="media-body">
<h4 class="media-heading">Producto</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, quasi doloribus non repellendus quae aperiam. Quos, eligendi itaque soluta ut dignissimos reprehenderit commodi laboriosam quis atque minus enim magnam delectus.</div>
</div>
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Producto</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, repellendus, ad, adipisci neque earum culpa magnam veritatis ipsum dolores odio laboriosam sed veniam accusamus! Architecto, provident nulla recusandae repellendus illo!</div>
</div>
</div>
</div>
<hr class="hidden-md hidden-lg">
<div class="col-lg-4 col-md-6">
<div class="media-object-default">
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Producto</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit, eos, et in quam laboriosam ipsum laudantium laborum provident nihil modi reprehenderit tempora voluptatum quasi non libero quaerat vel. Assumenda, officiis?</div>
</div>
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Producto</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, minus, praesentium dignissimos non provident et consectetur illo expedita aliquam laboriosam esse incidunt deleniti accusantium debitis voluptas. Non vitae quos dolorem.</div>
</div>
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Producto</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, ducimus quidem aliquam voluptate quas impedit modi neque quasi deleniti dicta. Dolore, provident, unde voluptas dicta fugit odit maxime eius minus!</div>
</div>
</div>
</div>
<hr class="hidden-lg">
<div class="col-lg-4 col-md-12 hidden-md">
<div class="media-object-default">
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Media Encabezado 1</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro dolorum reprehenderit vitae omnis. Quidem, recusandae, magni ut perspiciatis nobis consequuntur ullam molestias molestiae obcaecati ea labore aspernatur modi. Impedit, fugit!</div>
</div>
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Media Encabezado 2</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, libero, ea itaque atque vero quidem esse optio minus tenetur dolorem delectus nemo fugit deserunt quibusdam veritatis assumenda obcaecati praesentium omnis!</div>
</div>
<div class="media">
<div class="media-left"> <a href="#"> <img class="media-object" src="images/100X125.gif" alt="placeholder image"></a></div>
<div class="media-body">
<h4 class="media-heading">Media Encabezado 2</h4>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam, cumque, ad voluptatibus vel perspiciatis reprehenderit magni in recusandae voluptatum iusto commodi laudantium veritatis esse labore nisi error tempora debitis impedit.</div>
</div>
</div>
</div>
</div>
</div>
<hr>
<div class="container well">
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-7">
<div class="row">
<div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
<div>
<ul class="list-unstyled">
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
</ul>
</div>
</div>
<div class="col-sm-4 col-md-4 col-lg-4  col-xs-6">
<div>
<ul class="list-unstyled">
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
</ul>
</div>
</div>
<div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">
<div>
<ul class="list-unstyled">
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
<li> <a>Link </a> </li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
<address>
<strong>MiNegocio, Inc.</strong><br>
Mis Redes Sociales<br>
San Juan, CABA, 9911<br>
<abbr title="Telefono">Tel:</abbr> (123) 456-7890
</address>
<address>
<strong>E-Mail</strong><br>
<a href="mailto:#">first.last@example.com</a>
</address>
</div>
</div>
</div>

<footer class="text-center">
<div class="container">
<div class="row">
<div class="col-xs-12">
<p>Copyright © MyWebsite. 2019 2020 Derechos Reservados.</p>
</div>
</div>
</div>
</footer>
<!-- jQuery (necesario para los JavaScript plugins Bootstrap) -->
<!-- esto funciona fuera de las etiquetas head por alguna razon, wtf -->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>