<!--conexion a BD-->
<?php include('conexion.php');?>
<html>

<head>
<title>Reporte de Thin Clients</title>
	<link rel="stylesheet" href="css/main.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<link rel="shortcut icon" href="img/report2.png">

 
  <script type="text/javascript" language="javascript" src="js/jquery-3.6.0.js"></script>


	<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copyHtml5',
			'excelHtml5'
		]
	} );
} );

if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
	</script>
</head>

<body>

	<div class="container">
 
 
<header><!---------------------------Encabezado-------------------------------->

  <?php
  	include 'header_footer/header.php';
  ?>
 
</header><!--------------------------Encabezado-------------------------------->
    
    

 

        <div class="container">
        
            <div class="row row-cols-1 row-cols-md-4 g-4">
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc01/pc0.png" class="card-img-top border border-dark" alt="PC 01">
      <div class="card-body">
        <h5 class="card-title">Thin Client 01</h5>
         <a href="/reporte/paginas/pc01.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc02/pc0.png" class="card-img-top border border-dark" alt="PC 02">
      <div class="card-body">
        <h5 class="card-title">Thin Client 02</h5>
        <a href="/reporte/paginas/pc02.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc03/pc0.png" class="card-img-top border border-dark" alt="PC 03">
      <div class="card-body">
        <h5 class="card-title">Thin Client 03</h5>
        <a href="/reporte/paginas/pc03.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc04/pc0.png" class="card-img-top border border-dark" alt="PC 04">
      <div class="card-body">
        <h5 class="card-title">Thin Client 04</h5>
        <a href="/reporte/paginas/pc04.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc05/pc0.png" class="card-img-top border border-dark" alt="PC 05">
      <div class="card-body">
        <h5 class="card-title">Thin Client 05</h5>
        <a href="/reporte/paginas/pc05.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc06/pc0.png" class="card-img-top border border-dark" alt="PC 06">
      <div class="card-body">
        <h5 class="card-title">Thin Client 06</h5>
        <a href="/reporte/paginas/pc06.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc07/pc0.png" class="card-img-top border border-dark" alt="PC 07">
      <div class="card-body">
        <h5 class="card-title">Thin Client 07</h5>
        <a href="/reporte/paginas/pc07.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc08/pc0.png" class="card-img-top border border-dark" alt="PC 08">
      <div class="card-body">
        <h5 class="card-title">Thin Client 08</h5>
        <a href="/reporte/paginas/pc08.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc09/pc0.png" class="card-img-top border border-dark" alt="PC 09">
      <div class="card-body">
        <h5 class="card-title">Thin Client 09</h5>
        <a href="/reporte/paginas/pc09.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc10/pc0.png" class="card-img-top border border-dark" alt="PC 10">
      <div class="card-body">
        <h5 class="card-title">Thin Client 10</h5>
        <a href="/reporte/paginas/pc10.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc11/pc0.png" class="card-img-top border border-dark" alt="PC 11">
      <div class="card-body">
        <h5 class="card-title">Thin Client 11</h5>
        <a href="/reporte/paginas/pc11.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc12/pc0.png" class="card-img-top border border-dark" alt="PC 12">
      <div class="card-body">
        <h5 class="card-title">Thin Client 12</h5>
        <a href="/reporte/paginas/pc12.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100 card card-body flex-fill shadow p-3 mb-5 bg-body rounded img-wrapper">
      <img src="/reporte/img/pc13/pc0.png" class="card-img-top border border-dark" alt="PC 13">
      <div class="card-body">
        <h5 class="card-title">Thin Client 13</h5>
        <a href="/reporte/paginas/pc13.php" class="btn btn-dark">Reporte</a>
      </div>
    </div>
  </div>
  
</div>
        </div> <!-- Finaliza div de container -->
        
        <hr>
        
       <div class="shadow p-3 mb-5 bg-body rounded">
 <?php
/* ============================================
   MANTENER LÓGICA ORIGINAL + ADAPTACIÓN AUTOMÁTICA
   ============================================ */

// Rangos IP (como en el original pero expandido)
$rangos_internos = ['10.19.*.*', '10.0.*.*', '192.168.*.*'];

// URLs según entorno
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    // XAMPP - Desarrollo
    $urls = [
        'interno' => 'http://localhost/reporte/datatables2.php',
        'externo' => 'http://localhost/reporte/datatables2.php' // Misma en desarrollo
    ];
} else {
    // Producción - URLs originales
    $urls = [
        'interno' => 'http://10.19.16.68/reporte/datatables2.php',
        'externo' => 'http://172.16.7.124/reporte/datatables2.php'
    ];
}

// IP del cliente
$ip = $_SERVER['REMOTE_ADDR'];

// Verificar si está en rangos internos (lógica del original mejorada)
$es_interno = false;
foreach ($rangos_internos as $rango) {
    $patron = str_replace(['.', '*'], ['\.', '.*'], $rango);
    if (preg_match('/^' . $patron . '$/', $ip)) {
        $es_interno = true;
        break;
    }
}

// Elegir URL
$url_final = $es_interno ? $urls['interno'] : $urls['externo'];

// Mostrar (igual al original pero con URL adaptada)
echo "<iframe src='$url_final' height='100%' width='100%'></iframe>";

// Info adicional
echo "<!-- 
    Entorno: " . ($_SERVER['SERVER_NAME'] === 'localhost' ? 'XAMPP' : 'Producción') . "
    IP: $ip
    Tipo: " . ($es_interno ? 'Interno' : 'Externo') . "
-->";
?>
 </div>
  <!----------------------------------------- inicia el footer---------------------------------------------------------------------------------------- -->
<?php 

include('header_footer/footer.php');
?>
<!-------------------------------------------- acaba el footer ------------------------------------------------------------------------------------------>

 

<script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function()
{
    $(".img-wrapper").find("img").css("transition", "transform 500ms ease-in-out");

    $(".img-wrapper").hover(    
        // Handler for mouseenter
        function()
        {
            $(this).find("img").css("transform", "scale(1.1)");
        },
        // Handler for mouseleave
        function()
        {
            $(this).find("img").css("transform", "scale(1)");
        }
    );
});
    </script> 

</body>

</html>