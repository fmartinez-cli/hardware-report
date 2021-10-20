<!--conexion a BD-->
<?php include('conexion.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
   <!-- <link rel="stylesheet" href="/reporte/DataTables/DataTables-1.11.0/css/dataTables.bootstrap.min.css"> añadir solo si falla la tabla-->
    <link rel="stylesheet" href="/reporte/DataTables/DataTables-1.11.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/reporte/DataTables/Buttons-2.0.0/css/1.5.6/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="/reporte/DataTables/DataTables-1.11.0/js/1.11.3/jquery.dataTables.min.css">
   

<script src="/reporte/DataTables/DataTables-1.11.0/js/jquery-3.3.1.min.js/jquery-3.3.1.min.js"></script>
<script src="/reporte/DataTables/DataTables-1.11.0/js/daysjs.min.js"></script>
<script src="/reporte/DataTables/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>
<script src="/reporte/DataTables/DataTables-1.11.0/js/1.10.19/dataTables.bootstrap.min.js"></script>
<script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/dataTables.buttons.min.js"></script>
<script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/buttons.bootstrap.min.js"></script>
<script src="/reporte/DataTables/JSZip-2.5.0/jszip.min.js"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> boton para exportar como pdf-->

<script src="/reporte/DataTables/Buttons-2.0.0/js/buttons.html5.min.js"></script>
<script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/buttons.print.min.js"></script>
<script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/buttons.colVis.min.js"></script>
 <script>
 
     $(document).ready(function() {
        var table = $('#example').DataTable( {
            // dom: 'Blfrtip',
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'colvis']
        } );

        table.buttons().container()
            .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    } );
 
 </script>
   <style>
 
table.dataTable thead {

  color: white;
  background-color: black;

}
 
 </style>
  </head>
<body >
	<div class="container-fluid">
	

		
			<div class="content">
				
				</div>
				
          <div class="table-responsive-xl-lg-md-sm">
          <table id="example" class="hover cell-border" style="width:100%">
						<thead>
							<tr>
              <th class="dark sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Equipo: activate to sort column descending" style="width: 115px;">Equipo</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CPU: activate to sort column ascending" style="width: 5%;">CPU</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Monitor: activate to sort column ascending" style="width: 5%;">Monitor</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Teclado: activate to sort column ascending" style="width: 5%;">Teclado</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mouse: activate to sort column ascending" style="width: 5%;">Mouse</th>                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="KVM: activate to sort column ascending" style="width: 5%;">KVM</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Cable VGA: activate to sort column ascending" style="width: 5%;">Cable VGA</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Cable KVM: activate to sort column ascending" style="width: 5%;">Cable KVM</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="DisplayPort: activate to sort column ascending" style="width: 5%;">Display Port</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Conector C14: activate to sort column ascending" style="width: 5%;">Conector C14</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mouse Pad: activate to sort column ascending" style="width: 5%;">Mouse Pad</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Notas: activate to sort column ascending" style="width: auto;">Notas</th>
              <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Fech de Revision: activate to sort column ascending" style="width: 10%;">Fecha de Revision</th>
              </tr>
						</thead>
							
					<?php      
                    
$sql = "SELECT DATE_FORMAT(fregis,'%d-%m-%Y') AS fecha,thinclient,cpu,monitor,teclado,mouse,kvm,cablevga,cablekvm,displayport,conector14,mousepad,notaCPU FROM thinclients"; 
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
<td>".$result -> fecha."</td>
</tr>";

   }
 }
?>
</tbody>
</div>
</div>
<script>


    $("tr").each(function(){
        $(this).children("td").each(function(){
            switch ($(this).html()) {
                case 'ok':
                    $(this).css("background-color", "#00bb2d ");
                break;
                case 'error!':
                    $(this).css("background-color", "fe0000");
               
                break;
            }
        })
    });


</script>

</body>
</html>