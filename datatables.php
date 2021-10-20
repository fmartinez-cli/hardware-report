<!--conexion a BD-->
<?php include('conexion.php');?>

<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>DataTables example - HTML5 export buttons</title>
	<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="DataTables/jquery.dataTables.min.css"">
	<link rel="stylesheet" type="text/css" href="DataTables/Buttons-2.0.0/css/buttons.dataTables.min.css">
 
  <script type="text/javascript" language="javascript" src="js/jquery-3.6.0.js"></script>
	<script type="text/javascript" language="javascript" src="DataTables/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="DataTables/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="DataTables/Buttons-2.0.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
 


	<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'colvis',
      'copyHtml5',
			'excelHtml5'
      
		]
	} );
} );
	</script>

 <style>
 
table.dataTable thead {

  color: white;
  background-color: black;

}
 
 </style>
</head>
<body class="wide comments example">
	<div class="fw-background">
		<div></div>
	</div>
	<div class="fw-container">
		</div>
		<div class="fw-body">
			<div class="content">
				
				</div>
				
          <div class="dt-buttons"></label></div>
          <table id="example" class="display" style="width: 100%;" aria-describedby="example_info">
						<thead>
							<tr>
              <th class="dark sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Equipo: activate to sort column descending" style="width: 115px;">Equipo</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CPU: activate to sort column ascending" style="width: 5%;">CPU</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Monitor: activate to sort column ascending" style="width: 5%;">Monitor</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Teclado: activate to sort column ascending" style="width: 5%;">Teclado</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mouse: activate to sort column ascending" style="width: 5%;">Mouse</th>                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="KVM: activate to sort column ascending" style="width: 5%;">KVM</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Cable VGA: activate to sort column ascending" style="width: 5%;">Cable VGA</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Cable KVM: activate to sort column ascending" style="width: 5%;">Cable KVM</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="DisplayPort: activate to sort column ascending" style="width: 5%;">DisplayPort</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Conector C14: activate to sort column ascending" style="width: 5%;">Conector C14</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mouse Pad: activate to sort column ascending" style="width: 5%;">Mouse Pad</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Notas: activate to sort column ascending" style="width: auto;">Notas</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Fech de Revision: activate to sort column ascending" style="width: 10%;">Fecha de Revision</th>
              </tr>
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
<td>".$result -> thinclient."</td>
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
</body>
</html>