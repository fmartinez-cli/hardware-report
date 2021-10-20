<!--conexion a BD-->
<?php include('../conexion.php');?>
<html>

<head>
	<title>Reporte de PC 10</title>
	<link rel="stylesheet" href="../css/main.css">
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="../img/report2.png">
	<link rel="stylesheet" type="text/css" href="../DataTables/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../DataTables/Buttons-2.0.0/css/buttons.dataTables.min.css">
 
  <script type="text/javascript" language="javascript" src="../js/jquery-3.6.0.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables/JSZip-2.5.0/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="../DataTables/Buttons-2.0.0/js/buttons.html5.min.js"></script>

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
 
 
<header style="margin-bottom: 2%;">
			<nav class="navbar navbar-light navbar-expand-md navbar-dark bg-dark justify-content-center">
				<div class="container">
					<a href="/reporte/index.php" class="navbar-brand d-flex w-50 me-auto">Inicio</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="navbar-nav w-100 justify-content-center">
           
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Elegir PC </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                       <!-- <li><a class="dropdown-item" href="#">Item</a></li>
                        <li><a class="dropdown-item" href="#">Item</a></li>-->
                        
                        <li><a class="dropdown-item" href="pc01.php">PC 01</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc02.php">PC 02</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc03.php">PC 03</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc04.php">PC 04</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc05.php">PC 05</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc06.php">PC 06</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc07.php">PC 07</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc08.php">PC 08</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc09.php">PC 09</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">PC 10</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc11.php">PC 11</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc12.php">PC 12</a></li>
                         <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="pc13.php">PC 13</a></li>
                    </ul>
                </li>
            </ul>
              <a href="/reporte/ayuda.php" target="blank" class="navbar-brand d-flex w-50 me-auto">Ayuda</a>
        </div>
    </div>
</nav>
    </header>
    
    
 
    
    
		<div class="row">
			<div class="col">
				<!-- *****************************INICIA EL SCRIPT PARA MOSTRAR LA IMAGEN******************************************************************** -->
	
					<div class="threesixty" style="width:20% height:20%" data-path="../img/pc10/pc{index}.png" data-count="1"></div>


                <!-- *****************************FINALIZA EL SCRIPT PARA MOSTRAR LA IMAGEN******************************************************************** -->
            <div class="table-responsive shadow p-3 mb-5 bg-body rounded">
    <h2 style=" text-align:center;"> Thin Client 10</H2>
    <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col"> Hardware</th>
      <th scope="col">Descripcion</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">IP DeathNet</th>
      <td>172.16.6.129</td>
    </tr>
      <th scope="row">Modelo</th>
      <td>T610</td>
    </tr>
    <tr>
      <th scope="row">Procesador</th>
      <td>AMD G-T56N</td>
    </tr>
     <tr>
      <th scope="row">Memoria</th>
      <td>4.0 GB</td>
    </tr>
     <tr>
      <th scope="row">S. O.</th>
      <td>WINDOWS 7 Pro</td>
    </tr>
  </tbody>
</table>
    </div>       
                
            </div>
            <div class="col">
            <?php
date_default_timezone_set("America/Chihuahua");
    
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////

$thinclient= "ThinClient 10";
$cpu=$_POST['cpu'];
$monitor=$_POST['monitor'];
$teclado=$_POST['teclado'];
$mouse=$_POST['mouse'];
$kvm=$_POST['kvm'];
$cablevga=$_POST['cablevga'];
$cablekvm=$_POST['cablekvm'];
$displayport=$_POST['displayport'];
$conector14=$_POST['conector14'];
$mousepad=$_POST['mousepad'];
////////////////////////////////////////////////////////////////
$notaCPU=$_POST['notaCPU'];
$fregis = date('Y-m-d');
///////// Fin informacion enviada por el formulario ///

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into thinclients(thinclient,cpu,monitor,teclado,mouse,kvm,cablevga,cablekvm,displayport,conector14,mousepad,notaCPU,fregis) values(:thinclient,:cpu,:monitor,:teclado,:mouse,:kvm,:cablevga,:cablekvm,:displayport,:conector14,:mousepad,:notaCPU,:fregis)";
    
$sql = $connect->prepare($sql);
////////// items ///////////////////////////
$sql->bindParam(':thinclient',$thinclient,PDO::PARAM_STR, 15);    
$sql->bindParam(':cpu',$cpu,PDO::PARAM_STR, 25);
$sql->bindParam(':monitor',$monitor,PDO::PARAM_STR, 25);
$sql->bindParam(':teclado',$teclado,PDO::PARAM_STR,25);
$sql->bindParam(':mouse',$mouse,PDO::PARAM_STR,25);
$sql->bindParam(':kvm',$kvm,PDO::PARAM_STR,25);
$sql->bindParam(':cablevga',$kvm,PDO::PARAM_STR,25);
$sql->bindParam(':cablekvm',$cablekvm,PDO::PARAM_STR,25);
$sql->bindParam(':displayport',$displayport,PDO::PARAM_STR,25);
$sql->bindParam(':conector14',$conector14,PDO::PARAM_STR,25);
$sql->bindParam(':mousepad',$mousepad,PDO::PARAM_STR,25);

//////////////////// notas //////////////////////////
$sql->bindParam(':notaCPU',$notaCPU,PDO::PARAM_STR,255);
$sql->bindParam(':fregis',$fregis,PDO::PARAM_STR);
    
$sql->execute();

/*
///// script que muestra con exito el registro en la base de datos activarlo solo para desarrollo ///////////////

$lastInsertId = $connect->lastInsertId();
if($lastInsertId>0){

echo "<div class='content alert alert-primary' > Gracias .. Tu Nombre es : $cpu </div>";
}
else{
    echo "<div class='content alert alert-danger'> No se pueden agregar datos, comuniquese con el administrador  </div>";

print_r($sql->errorInfo()); 
}
*/

}// Cierra envio de guardado
?>
              <?php include '../formulario/tabla2.php';?>




        

	</div>
 <hr>


<div class="shadow p-3 mb-5 bg-body rounded">
 <?php


/* Listamos un rango de IPs*/
$rango_ip = array('10.19.*.*');

/* Obtener dirección IP del visitante */
$ip_visitante = $_SERVER['REMOTE_ADDR'];

  
/* Checamos si la IP del visitante esta dentro del rango de IPs denegadas*/

if(!empty($rango_ip))
{
foreach($rango_ip as $rango)
{
	$rango = str_replace('*','(.*)', $rango);

    if(preg_match('/'.$rango.'/', $ip_visitante))//mi ip es 10.19.8.179, si esta dentro del rango, se muestra el primer iframe(10.19.16.68) sino, se muestra el segundo iframe(172.16.7.124)
	{
	  echo "<iframe src='http://10.19.16.68/reporte/datatables2.php' height='100%' width='100%'></iframe>"; //utilizar comillas simples dentro de las etiquetas pues las comillas dobles dan problemas
	}else{
  
  echo "<iframe src='http://172.16.7.124/reporte/datatables2.php' height='100%' width='100%'></iframe>";
  }
 }
}
?>
 </div>
  <!----------------------------------------- inicia el footer---------------------------------------------------------------------------------------- -->


<?php include '../header_footer/footer.php';?>

<!-------------------------------------------- acaba el footer ------------------------------------------------------------------------------------------>

 
 </div>

<script src="../js/jquery-1.12.4.min.js"></script>
    <script src="../js/jquery.threesixty.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {

            var $threeSixty = $('.threesixty');

            $threeSixty.threeSixty({
                dragDirection: 'horizontal',
                useKeys: true,
                draggable: true
            });

            $('.next').click(function() {
                $threeSixty.nextFrame();
            });

            $('.prev').click(function() {
                $threeSixty.prevFrame();
            });

            $threeSixty.on('down', function() {
                $('.ui, h1, h2, .label, .examples').stop().animate({
                    opacity: 0
                }, 300);
            });

            $threeSixty.on('up', function() {
                $('.ui, h1, h2, .label, .examples').stop().animate({
                    opacity: 1
                }, 500);
            });
        });
    </script> 
</body>

</html>