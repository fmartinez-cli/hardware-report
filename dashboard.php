<?php
// dashboard.php - VISTA EN TIEMPO REAL PARA INGENIEROS SR
include('conexion.php');

// Verificar conexión PDO
if(!isset($connect) || !($connect instanceof PDO)) {
    die('<div class="alert alert-danger">
        <h4>❌ Error de conexión PDO</h4>
        <p>La variable $connect no está definida como instancia PDO.</p>
        <p>Verifica que <code>conexion.php</code> se esté incluyendo correctamente.</p>
    </div>');
}

try {
    // Obtener último estado de CADA equipo
    $query = "
        SELECT t1.* FROM thinclients t1
        INNER JOIN (
            SELECT thinclient, MAX(fregis) as ultima_fecha 
            FROM thinclients 
            GROUP BY thinclient
        ) t2 ON t1.thinclient = t2.thinclient AND t1.fregis = t2.ultima_fecha
        ORDER BY t1.thinclient";
    
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die('<div class="alert alert-danger">
            <h4>❌ Error en consulta</h4>
            <p>' . htmlspecialchars($e->getMessage()) . '</p>
         </div>');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📊 Dashboard - Estado ThinClients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        :root {
            --color-ok: #198754;
            --color-error: #dc3545;
            --color-parcial: #ffc107;
            --color-pendiente: #6c757d;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            border-radius: 0 0 20px 20px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .card-equipo {
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            height: 100%;
        }
        
        .card-equipo:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .card-equipo.ok {
            border-left: 5px solid var(--color-ok);
        }
        
        .card-equipo.error {
            border-left: 5px solid var(--color-error);
        }
        
        .card-equipo.parcial {
            border-left: 5px solid var(--color-parcial);
        }
        
        .card-equipo.pendiente {
            border-left: 5px solid var(--color-pendiente);
        }
        
        .estado-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.2rem;
        }
        
        .estado-texto {
            font-size: 0.85rem;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .estado-ok {
            background-color: rgba(25, 135, 84, 0.1);
            color: var(--color-ok);
        }
        
        .estado-error {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--color-error);
        }
        
        .estado-parcial {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
        }
        
        .tiempo-transcurrido {
            font-size: 0.8rem;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .notas-container {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 10px;
            margin-top: 10px;
            font-size: 0.85rem;
            max-height: 80px;
            overflow-y: auto;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            margin-bottom: 1.5rem;
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1;
        }
        
        .stats-label {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .filter-buttons .btn {
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 0.85rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        .last-update {
            position: fixed;
            bottom: 15px;
            right: 15px;
            background: rgba(248, 249, 250, 0.95);
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.8rem;
            color: #495057;
            border: 1px solid #dee2e6;
            backdrop-filter: blur(5px);
            z-index: 1000;
        }
        
        .auto-refresh-control {
            position: fixed;
            bottom: 15px;
            left: 15px;
            background: white;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 0.8rem;
            color: #495057;
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 1.8rem;
            }
            
            .stats-number {
                font-size: 2rem;
            }
            
            .last-update, .auto-refresh-control {
                position: relative;
                bottom: auto;
                right: auto;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <!-- Encabezado del Dashboard -->
    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold mb-3">
                        <i class="bi bi-speedometer2"></i> Dashboard ThinClients
                    </h1>
                    <p class="lead mb-0">Vista consolidada</p>
                    <small class="opacity-75">Actualizado automáticamente cada 60 segundos</small>
                </div>
                <div class="col-md-4 text-end">
                    <div class="stats-card d-inline-block text-dark">
                        <div class="stats-number"><?php echo count($equipos); ?></div>
                        <div class="stats-label">Equipos Monitoreados</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <!-- Filtros y controles -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="filter-buttons">
                    <button class="btn btn-outline-success active" onclick="filtrarEquipos('todos')">
                        <i class="bi bi-grid"></i> Todos (<?php echo count($equipos); ?>)
                    </button>
                    <button class="btn btn-outline-success" onclick="filtrarEquipos('ok')">
                        <i class="bi bi-check-circle"></i> OK
                    </button>
                    <button class="btn btn-outline-danger" onclick="filtrarEquipos('error')">
                        <i class="bi bi-x-circle"></i> Con Problemas
                    </button>
                    <button class="btn btn-outline-warning" onclick="filtrarEquipos('parcial')">
                        <i class="bi bi-exclamation-triangle"></i> Parcial
                    </button>
                    <button class="btn btn-outline-secondary" onclick="filtrarEquipos('pendiente')">
                        <i class="bi bi-clock"></i> Pendientes
                    </button>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <button class="btn btn-primary" onclick="exportarExcel()">
                    <i class="bi bi-file-earmark-excel"></i> Exportar Excel
                </button>
                <button class="btn btn-outline-secondary" onclick="recargarDashboard()">
                    <i class="bi bi-arrow-clockwise"></i> Actualizar
                </button>
            </div>
        </div>
        
        <!-- Estadísticas -->
        <div class="row mb-4">
            <?php
            // Calcular estadísticas
            $estadisticas = [
                'ok' => 0,
                'error' => 0,
                'parcial' => 0,
                'pendiente' => 0
            ];
            
            foreach($equipos as $equipo) {
                $estado = determinarEstado($equipo);
                $estadisticas[$estado]++;
            }
            
            function determinarEstado($equipo) {
                if (!isset($equipo['estado'])) {
                    return 'pendiente';
                }
                
                if ($equipo['estado'] === 'ok') {
                    return 'ok';
                } elseif ($equipo['estado'] === 'error') {
                    return 'error';
                } elseif ($equipo['estado'] === 'parcial') {
                    return 'parcial';
                }
                
                return 'pendiente';
            }
            ?>
            
            <div class="col-md-3 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number text-success"><?php echo $estadisticas['ok']; ?></div>
                    <div class="stats-label">Todo OK</div>
                    <div class="mt-2">
                        <span class="badge bg-success"><?php echo round(($estadisticas['ok'] / count($equipos)) * 100, 1); ?>%</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number text-danger"><?php echo $estadisticas['error']; ?></div>
                    <div class="stats-label">Con Problemas</div>
                    <div class="mt-2">
                        <span class="badge bg-danger"><?php echo round(($estadisticas['error'] / count($equipos)) * 100, 1); ?>%</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number text-warning"><?php echo $estadisticas['parcial']; ?></div>
                    <div class="stats-label">Parciales</div>
                    <div class="mt-2">
                        <span class="badge bg-warning"><?php echo round(($estadisticas['parcial'] / count($equipos)) * 100, 1); ?>%</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-3">
                <div class="stats-card text-center">
                    <div class="stats-number text-secondary"><?php echo $estadisticas['pendiente']; ?></div>
                    <div class="stats-label">Pendientes</div>
                    <div class="mt-2">
                        <span class="badge bg-secondary"><?php echo round(($estadisticas['pendiente'] / count($equipos)) * 100, 1); ?>%</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grid de equipos -->
        <div class="row" id="equiposGrid">
            <?php if(!empty($equipos)): ?>
                <?php foreach($equipos as $equipo): 
                    $estado = determinarEstado($equipo);
                    $estadoClase = '';
                    $estadoTexto = '';
                    $estadoColor = '';
                    $icono = '';
                    
                    switch($estado) {
                        case 'ok':
                            $estadoClase = 'ok';
                            $estadoTexto = 'TODO OK';
                            $estadoColor = 'estado-ok';
                            $icono = '✅';
                            break;
                        case 'error':
                            $estadoClase = 'error';
                            $estadoTexto = 'CON PROBLEMAS';
                            $estadoColor = 'estado-error';
                            $icono = '❌';
                            break;
                        case 'parcial':
                            $estadoClase = 'parcial';
                            $estadoTexto = 'PARCIAL';
                            $estadoColor = 'estado-parcial';
                            $icono = '⚠️';
                            break;
                        default:
                            $estadoClase = 'pendiente';
                            $estadoTexto = 'PENDIENTE';
                            $estadoColor = 'estado-pendiente';
                            $icono = '⏱️';
                    }
                    
                    // Calcular tiempo transcurrido
                    $tiempoTranscurrido = '';
                    if (isset($equipo['fregis'])) {
                        $fechaReporte = new DateTime($equipo['fregis']);
                        $ahora = new DateTime();
                        $diferencia = $ahora->diff($fechaReporte);
                        
                        if ($diferencia->d > 0) {
                            $tiempoTranscurrido = $diferencia->d . 'd ' . $diferencia->h . 'h';
                        } elseif ($diferencia->h > 0) {
                            $tiempoTranscurrido = $diferencia->h . 'h ' . $diferencia->i . 'm';
                        } else {
                            $tiempoTranscurrido = $diferencia->i . 'm ' . $diferencia->s . 's';
                        }
                    }
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4 equipo-card" data-estado="<?php echo $estado; ?>">
                    <div class="card card-equipo <?php echo $estadoClase; ?>">
                        <div class="card-body position-relative">
                            <span class="estado-badge"><?php echo $icono; ?></span>
                            
                            <h5 class="card-title fw-bold mb-2">
                                <?php echo htmlspecialchars($equipo['thinclient']); ?>
                            </h5>
                            
                            <div class="mb-2">
                                <span class="estado-texto <?php echo $estadoColor; ?>">
                                    <?php echo $estadoTexto; ?>
                                </span>
                            </div>
                            
                            <?php if(isset($equipo['fregis'])): ?>
                            <div class="tiempo-transcurrido mb-2">
                                <i class="bi bi-clock"></i>
                                <span>Reportado hace: <?php echo $tiempoTranscurrido; ?></span>
                            </div>
                            <?php endif; ?>
                            
                            <?php if(isset($equipo['fregis'])): ?>
                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-calendar"></i>
                                    <?php echo date('d/m/Y H:i', strtotime($equipo['fregis'])); ?>
                                </small>
                            </div>
                            <?php endif; ?>
                            
                            <?php if(!empty($equipo['notas'])): ?>
                            <div class="notas-container">
                                <small class="fw-bold">📝 Notas:</small><br>
                                <small><?php echo htmlspecialchars($equipo['notas']); ?></small>
                            </div>
                            <?php endif; ?>
                            
                            <?php if(isset($equipo['tecnico'])): ?>
                            <div class="mt-2">
                                <small class="text-muted">
                                    <i class="bi bi-person"></i>
                                    <?php echo htmlspecialchars($equipo['tecnico']); ?>
                                </small>
                            </div>
                            <?php endif; ?>
                            
                            <div class="mt-3 d-flex gap-2">
                                <button class="btn btn-outline-secondary btn-sm flex-grow-1" 
                                        onclick="verHistorial('<?php echo urlencode($equipo['thinclient']); ?>')">
                                    <i class="bi bi-clock-history"></i> Historial
                                </button>
                                <button class="btn btn-outline-primary btn-sm flex-grow-1" 
                                        onclick="reportarAhora('<?php echo htmlspecialchars($equipo['thinclient']); ?>')">
                                    <i class="bi bi-arrow-repeat"></i> Reportar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">
                        <h4>No hay equipos registrados aún</h4>
                        <p>No se encontraron reportes de thinclients en el sistema.</p>
                        <a href="index.php" class="btn btn-primary">Ir al Reporte Rápido</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Resumen final -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-light border">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><i class="bi bi-info-circle"></i> Resumen del Estado</h6>
                            <small class="text-muted">
                                Total equipos: <strong><?php echo count($equipos); ?></strong> | 
                                OK: <span class="text-success"><?php echo $estadisticas['ok']; ?></span> | 
                                Problemas: <span class="text-danger"><?php echo $estadisticas['error']; ?></span> | 
                                Parciales: <span class="text-warning"><?php echo $estadisticas['parcial']; ?></span> | 
                                Pendientes: <span class="text-secondary"><?php echo $estadisticas['pendiente']; ?></span>
                            </small>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-success" onclick="exportarResumen()">
                                <i class="bi bi-file-text"></i> Exportar Resumen
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Controles de actualización -->
    <div class="auto-refresh-control">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="autoRefresh" checked>
            <label class="form-check-label" for="autoRefresh">
                <i class="bi bi-arrow-repeat"></i> Auto-actualizar (60s)
            </label>
        </div>
        <div class="mt-2">
            <small class="text-muted">Última actualización: <span id="lastUpdateTime"><?php echo date('H:i:s'); ?></span></small>
        </div>
    </div>
    
    <!-- Última actualización -->
    <div class="last-update">
        <small>
            <i class="bi bi-database"></i> 
            <span class="badge bg-success">PDO</span>
            <span class="badge bg-info"><?php echo count($equipos); ?> equipos</span>
            <span class="badge bg-secondary"><?php echo date('d/m/Y'); ?></span>
        </small>
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
    
    <script>
    // ============================================
    // FUNCIONALIDADES DEL DASHBOARD
    // ============================================
    
    // 1. Filtrar equipos por estado
    function filtrarEquipos(estado) {
        // Actualizar botones activos
        document.querySelectorAll('.filter-buttons .btn').forEach(btn => {
            btn.classList.remove('active');
        });
        event.target.classList.add('active');
        
        // Mostrar/ocultar equipos según filtro
        const equipos = document.querySelectorAll('.equipo-card');
        equipos.forEach(equipo => {
            if (estado === 'todos' || equipo.getAttribute('data-estado') === estado) {
                equipo.style.display = 'block';
            } else {
                equipo.style.display = 'none';
            }
        });
    }
    
    // 2. Ver historial del equipo
    function verHistorial(equipo) {
        const url = `datatables2.php?filtro=${encodeURIComponent(equipo)}`;
        window.open(url, '_blank');
    }
    
    // 3. Reportar equipo ahora
    function reportarAhora(equipo) {
        // Abrir en una nueva ventana o redirigir
        window.open(`index.php?equipo=${encodeURIComponent(equipo)}`, '_blank');
    }
    
    // 4. Exportar a Excel
    function exportarExcel() {
        try {
            // Crear datos para exportar
            const datos = [];
            document.querySelectorAll('.equipo-card').forEach(card => {
                if (card.style.display !== 'none') {
                    const nombre = card.querySelector('.card-title').textContent.trim();
                    const estado = card.querySelector('.estado-texto').textContent.trim();
                    const tiempo = card.querySelector('.tiempo-transcurrido span')?.textContent.replace('Reportado hace: ', '').trim() || '';
                    const fecha = card.querySelector('.text-muted .bi-calendar')?.parentElement.textContent.trim() || '';
                    const notas = card.querySelector('.notas-container small')?.textContent.replace('📝 Notas:', '').trim() || '';
                    const tecnico = card.querySelector('.bi-person')?.parentElement.textContent.trim() || '';
                    
                    datos.push({
                        'Equipo': nombre,
                        'Estado': estado,
                        'Tiempo desde reporte': tiempo,
                        'Fecha/Hora reporte': fecha,
                        'Notas': notas,
                        'Técnico': tecnico
                    });
                }
            });
            
            if (datos.length === 0) {
                alert('No hay datos para exportar con el filtro actual');
                return;
            }
            
            // Crear hoja de cálculo
            const ws = XLSX.utils.json_to_sheet(datos);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Estado_ThinClients");
            
            // Descargar archivo
            const fecha = new Date().toISOString().slice(0, 10);
            const hora = new Date().toLocaleTimeString('es-ES', {hour12: false}).replace(/:/g, '-');
            XLSX.writeFile(wb, `Estado_ThinClients_${fecha}_${hora}.xlsx`);
            
            // Mostrar notificación
            mostrarNotificacion('success', '📊 Excel exportado correctamente');
            
        } catch (error) {
            console.error('Error al exportar Excel:', error);
            mostrarNotificacion('danger', '❌ Error al exportar Excel');
        }
    }
    
    // 5. Exportar resumen
    function exportarResumen() {
        const resumen = {
            'Total Equipos': <?php echo count($equipos); ?>,
            'Estado OK': <?php echo $estadisticas['ok']; ?>,
            'Estado ERROR': <?php echo $estadisticas['error']; ?>,
            'Estado PARCIAL': <?php echo $estadisticas['parcial']; ?>,
            'Estado PENDIENTE': <?php echo $estadisticas['pendiente']; ?>,
            'Porcentaje OK': '<?php echo round(($estadisticas['ok'] / count($equipos)) * 100, 1); ?>%',
            'Porcentaje ERROR': '<?php echo round(($estadisticas['error'] / count($equipos)) * 100, 1); ?>%',
            'Fecha Exportación': new Date().toLocaleString('es-ES')
        };
        
        const ws = XLSX.utils.json_to_sheet([resumen]);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Resumen");
        XLSX.writeFile(wb, `Resumen_ThinClients_${new Date().toISOString().slice(0, 10)}.xlsx`);
        
        mostrarNotificacion('success', '📄 Resumen exportado correctamente');
    }
    
    // 6. Recargar dashboard
    function recargarDashboard() {
        document.querySelector('.btn-outline-secondary .bi-arrow-clockwise').classList.add('spin');
        setTimeout(() => {
            location.reload();
        }, 300);
    }
    
    // 7. Auto-refresh
    let refreshInterval;
    const autoRefreshCheckbox = document.getElementById('autoRefresh');
    
    function iniciarAutoRefresh() {
        if (autoRefreshCheckbox.checked) {
            refreshInterval = setInterval(() => {
                actualizarDashboard();
            }, 60000); // 60 segundos
        }
    }
    
    function actualizarDashboard() {
        fetch(window.location.href)
            .then(response => response.text())
            .then(html => {
                // Extraer solo la parte del grid de equipos
                const parser = new DOMParser();
                const nuevoDoc = parser.parseFromString(html, 'text/html');
                const nuevoGrid = nuevoDoc.querySelector('#equiposGrid');
                
                if (nuevoGrid) {
                    document.getElementById('equiposGrid').innerHTML = nuevoGrid.innerHTML;
                    document.getElementById('lastUpdateTime').textContent = new Date().toLocaleTimeString('es-ES');
                    mostrarNotificacion('info', '🔄 Dashboard actualizado');
                }
            })
            .catch(error => {
                console.error('Error al actualizar:', error);
            });
    }
    
    // 8. Mostrar notificación
    function mostrarNotificacion(tipo, mensaje) {
        const toastHTML = `
            <div class="toast align-items-center text-white bg-${tipo} border-0 show position-fixed bottom-0 end-0 m-3" role="alert" style="z-index: 9999;">
                <div class="d-flex">
                    <div class="toast-body">
                        ${mensaje}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        `;
        
        $('body').append(toastHTML);
        setTimeout(() => $('.toast').remove(), 3000);
    }
    
    // ============================================
    // INICIALIZACIÓN
    // ============================================
    $(document).ready(function() {
        console.log('📊 Dashboard cargado');
        
        // Iniciar auto-refresh
        iniciarAutoRefresh();
        
        // Controlar auto-refresh
        autoRefreshCheckbox.addEventListener('change', function() {
            if (this.checked) {
                iniciarAutoRefresh();
            } else {
                clearInterval(refreshInterval);
            }
        });
        
        // Animación para icono de recarga
        const style = document.createElement('style');
        style.textContent = `
            .spin {
                animation: spin 0.5s linear;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    });
    </script>
</body>
</html>