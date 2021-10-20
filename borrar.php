<!--conexion a BD-->
<?php include('conexion.php');?>
<html>

<head>
	<title>Reporte de PC 01</title>
	<link rel="stylesheet" href="css/main.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script><script type="text/javascript" src="/media/js/site.js?_=e469aaf14ac009df7cbcc69a65357089"></script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fbuttons%2Fexamples%2Finitialisation%2Fexport.html" async=""></script>
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
	<script type="text/javascript" class="init">
	


$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
} );



	</script>

	<link rel="shortcut icon" href="img/report2.png">
</head>

<body>

	<div class="container">
 
 
<header><!---------------------------Encabezado-------------------------------->

  <?php
  	include 'header_footer/header.php';
  ?>
 
</header><!--------------------------Encabezado-------------------------------->
    
    
 

             




 
 <div class="table-responsive">
<table id="example" class="display nowrap dataTable" style="width: 100%;" aria-describedby="example_info">
<thead>
    <th class="table-dark">Equipo</th>
    <th class="table-dark">CPU</th>
    <th class="table-dark">Monitor</th>
    <th class="table-dark">Teclado</th>
    <th class="table-dark">Mouse</th>
    <th class="table-dark">KVM</th>
    <th class="table-dark">Cable VGA</th>
    <th class="table-dark">Cable KVM</th>
    <th class="table-dark">DisplayPort</th>
    <th class="table-dark">Conector C14</th>
    <th class="table-dark">Mouse Pad</th>
    <th class="table-dark">Notas</th>
    <th class="table-dark">Fecha de Revision</th>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM thinclients"; 
$query = $connect -> prepare($sql); 
$query -> execute(); 
$results = $query -> fetchAll(PDO::FETCH_OBJ); 

if($query -> rowCount() > 0)   { 
foreach($results as $result) { 
echo "<tr>
<td>Thin Client 1</td>
<td>".$result -> cpu."</td>
<td>".$result -> monitor."</td>
<td>".$result -> teclado."</td>
<td>".$result -> mouse."</td>
<td>".$result -> kvm."</td>
<td>".$result -> cablevga."</td>
<td>".$result -> cablekvm."</td>
<td>".$result -> displayport."</td>
<td>".$result -> conector14."</td>
<td>".$result -> mousepad."</td>
<td>".$result -> notaCPU."</td>
<td>".$result -> fregis."</td>
</tr>";

   }
 }
?>
</tbody>
</table>
</div>
 
<div>

 <?php


    $pdo = new PDO("mysql:host=10.19.16.68;dbname=reporte", "root", "imaginart3");

$sql = 'SELECT * FROM thinclients';
$stmt = $dbn->prepare($sql);
$stmt->execute(array(':username' => 'wangzhongwei', ':email' => 'wangzhongwei@163.com'));
echo $dbn->lastinsertid();

    ?>

</div

 
 </div>

<script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.threesixty.js"></script>
    <script src="js/bootstrap.js"></script>
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