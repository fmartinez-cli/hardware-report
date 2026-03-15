<!--conexion a BD-->
<?php include('conexion.php');?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/reporte/DataTables/DataTables-1.11.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/reporte/DataTables/Buttons-2.0.0/css/1.5.6/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="/reporte/DataTables/DataTables-1.11.0/js/1.11.3/jquery.dataTables.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

    <script src="/reporte/DataTables/DataTables-1.11.0/js/jquery-3.3.1.min.js/jquery-3.3.1.min.js"></script>
    <script src="/reporte/DataTables/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="/reporte/DataTables/DataTables-1.11.0/js/1.10.19/dataTables.bootstrap.min.js"></script>
    <script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/dataTables.buttons.min.js"></script>
    <script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/buttons.bootstrap.min.js"></script>
    <script src="/reporte/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="/reporte/DataTables/Buttons-2.0.0/js/buttons.html5.min.js"></script>
    <script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/buttons.print.min.js"></script>
    <script src="/reporte/DataTables/Buttons-2.0.0/js/1.5.6/buttons.colVis.min.js"></script>
    <!-- Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    
    <script>
      $(document).ready(function() {
    var table = $('#example').DataTable({
        responsive: true,
        columnDefs: [
            {
                targets: [  11,12], // Equipo, CPU, Notas, Fecha
                className: 'all' // ← Siempre visibles
            },
        
        ],
        dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        lengthChange: false,
        buttons: [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy"></i> Copiar',
                className: 'btn btn-secondary btn-sm'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-eye"></i> Columnas',
                className: 'btn btn-warning btn-sm'
            },
          // BOTÓN NUEVO: Versión completa
            {
                text: '<i class="fas fa-external-link-alt"></i> Versión Completa',
                className: 'btn btn-info btn-sm mb-2',
                action: function(e, dt, node, config) {
                    window.open('/reporte/datatables2.php', '_blank');
                }
            }
        ],
        responsive: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
        }
    });
});
    </script>
    
    <style>
        table.dataTable thead {
            color: white;
            background-color: #1a1a1a; /* Negro más intenso */
        }
        
        /* Colores VIVOS y llamativos */
        .estado-ok {
            background-color: #00C851 !important; /* Verde brillante */
            color: white !important;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
            border-radius: 4px;
        }
        
        .estado-error {
            background-color: #ff4444 !important; /* Rojo brillante */
            color: white !important;
            font-weight: bold;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
            border-radius: 4px;
        }
        
        /* Colorear TODAS las celdas con "ok" o "error" */
        td:contains("ok"):not(.estado-ok),
        td:contains("OK"):not(.estado-ok) {
            background-color: #00C851 !important;
            color: white !important;
            font-weight: bold;
        }
        
        td:contains("error"):not(.estado-error),
        td:contains("Error"):not(.estado-error),
        td:contains("error!"):not(.estado-error) {
            background-color: #ff4444 !important;
            color: white !important;
            font-weight: bold;
        }
        
        /* Efecto hover */
        .estado-ok:hover, .estado-error:hover {
            opacity: 0.9;
            transform: scale(1.02);
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        /* Estilos para móviles */
        @media (max-width: 768px) {
            .container-fluid {
                padding: 5px;
            }
            
            .estado-ok, .estado-error {
                padding: 3px 6px !important;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="content">
            <h4 class="mb-3">Reporte de Thin Clients</h4>
        </div>
        
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Equipo</th>
                        <th>CPU</th>
                        <th>Monitor</th>
                        <th>Teclado</th>
                        <th>Mouse</th>
                        <th>KVM</th>
                        <th>Cable VGA</th>
                        <th>Cable KVM</th>
                        <th>Display Port</th>
                        <th>Conector C14</th>
                        <th>Mouse Pad</th>
                        <th>Notas</th>
                        <th>Fecha Revisión</th>
                    </tr>
                </thead>
                <tbody>
                    <?php      
                    $sql = "SELECT DATE_FORMAT(fregis,'%d-%m-%Y') AS fecha, 
               CONCAT('Equipo ', SUBSTRING_INDEX(thinclient, ' ', -1)) AS thinclient, 
               cpu, monitor, teclado, mouse, kvm, cablevga, 
               cablekvm, displayport, conector14, mousepad, notaCPU 
        FROM thinclients";
                    $query = $connect->prepare($sql); 
                    $query->execute(); 
                    $results = $query->fetchAll(PDO::FETCH_OBJ); 

                    if($query->rowCount() > 0) { 
                        foreach($results as $result) { 
                            // Determinar clase CSS según estado
                            $clase_cpu = '';
                            if (strtolower($result->cpu) == 'ok') {
                                $clase_cpu = 'estado-ok';
                            } elseif (strtolower($result->cpu) == 'error' || strtolower($result->cpu) == 'error!') {
                                $clase_cpu = 'estado-error';
                            }
                            
                            echo "<tr>
                            <td>".htmlspecialchars($result->thinclient)."</td>
                            <td class='$clase_cpu'>".htmlspecialchars($result->cpu)."</td>
                            <td>".htmlspecialchars($result->monitor)."</td>
                            <td>".htmlspecialchars($result->teclado)."</td>
                            <td>".htmlspecialchars($result->mouse)."</td>
                            <td>".htmlspecialchars($result->kvm)."</td>
                            <td>".htmlspecialchars($result->cablevga)."</td>
                            <td>".htmlspecialchars($result->cablekvm)."</td>
                            <td>".htmlspecialchars($result->displayport)."</td>
                            <td>".htmlspecialchars($result->conector14)."</td>
                            <td>".htmlspecialchars($result->mousepad)."</td>
                            <td>".htmlspecialchars($result->notaCPU)."</td>
                            <td>".htmlspecialchars($result->fecha)."</td>
                            </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
        // Colorear TODAS las celdas automáticamente (no solo CPU)
        $(document).ready(function() {
            // Primero, colorear según clase
            $(".estado-ok, .estado-error").each(function() {
                $(this).css({
                    'text-align': 'center',
                    'padding': '6px 10px'
                });
            });
            
            // Luego, buscar y colorear cualquier celda con "ok" o "error"
            $("td").each(function() {
                var contenido = $(this).text().trim().toLowerCase();
                var $celda = $(this);
                
                // Si no tiene clase y contiene ok/error
                if (!$celda.hasClass('estado-ok') && !$celda.hasClass('estado-error')) {
                    if (contenido === 'ok') {
                        $celda.addClass('estado-ok');
                        $celda.css({
                            'background-color': '#00C851',
                            'color': 'white',
                            'font-weight': 'bold',
                            'text-align': 'center',
                            'padding': '6px 10px',
                            'border-radius': '4px'
                        });
                    } else if (contenido === 'error' || contenido === 'error!') {
                        $celda.addClass('estado-error');
                        $celda.css({
                            'background-color': '#ff4444',
                            'color': 'white',
                            'font-weight': 'bold',
                            'text-align': 'center',
                            'padding': '6px 10px',
                            'border-radius': '4px'
                        });
                    }
                }
            });
            
            // Efecto hover
            $("td").hover(
                function() {
                    if ($(this).hasClass('estado-ok') || $(this).hasClass('estado-error')) {
                        $(this).css('opacity', '0.9');
                    }
                },
                function() {
                    if ($(this).hasClass('estado-ok') || $(this).hasClass('estado-error')) {
                        $(this).css('opacity', '1');
                    }
                }
            );
        });
    </script>
</body>
</html>