<?php
// guardar_rapido.php - VERSIÓN PDO ESPECÍFICA
header('Content-Type: application/json');

// Incluir conexión PDO
include('conexion.php');

// Validar que recibimos datos
if(!isset($_POST['equipo']) || !isset($_POST['estado'])) {
    echo json_encode(['success' => false, 'error' => 'Datos incompletos: equipo o estado faltante']);
    exit;
}

// Recibir y sanitizar datos
$equipo = trim($_POST['equipo']);
$estado = $_POST['estado'];
$notas = isset($_POST['notas']) ? trim($_POST['notas']) : '';
$tecnico = isset($_POST['tecnico']) ? $_POST['tecnico'] : 'Tecnico_PlantaBaja';
$fecha_actual = date('Y-m-d');
$hora_actual = date('H:i:s');

// Validar estado
if(!in_array($estado, ['ok', 'error', 'parcial'])) {
    echo json_encode(['success' => false, 'error' => 'Estado inválido']);
    exit;
}

// Determinar valores según estado
if($estado === 'ok') {
    // Todos en "ok"
    $cpu = $monitor = $teclado = $mouse = $kvm = $cablevga = $cablekvm = $displayport = $conector14 = $mousepad = 'ok';
    $nota_final = "✅ TODO EN ORDEN - Reporte rápido - Técnico: $tecnico - $hora_actual";
} 
elseif($estado === 'error') {
    // Todos en "error!"
    $cpu = $monitor = $teclado = $mouse = $kvm = $cablevga = $cablekvm = $displayport = $conector14 = $mousepad = 'error!';
    $nota_final = "❌ FALLA GENERAL - Revisión urgente - Técnico: $tecnico - $hora_actual";
}
else { // parcial
    // Por defecto todo "ok", pero se especifica en notas qué falla
    $cpu = $monitor = $teclado = $mouse = $kvm = $cablevga = $cablekvm = $displayport = $conector14 = $mousepad = 'ok';
    $nota_final = "⚠️ PROBLEMA PARCIAL: $notas - Técnico: $tecnico - $hora_actual";
}

try {
    // Preparar consulta INSERT con PDO
    $sql = "INSERT INTO thinclients 
            (thinclient, cpu, monitor, teclado, mouse, kvm, cablevga, cablekvm, displayport, conector14, mousepad, notaCPU, fregis, created_at) 
            VALUES 
            (:thinclient, :cpu, :monitor, :teclado, :mouse, :kvm, :cablevga, :cablekvm, :displayport, :conector14, :mousepad, :notaCPU, :fregis, NOW())";
    
    $stmt = $connect->prepare($sql);
    
    // Vincular parámetros
    $stmt->bindParam(':thinclient', $equipo);
    $stmt->bindParam(':cpu', $cpu);
    $stmt->bindParam(':monitor', $monitor);
    $stmt->bindParam(':teclado', $teclado);
    $stmt->bindParam(':mouse', $mouse);
    $stmt->bindParam(':kvm', $kvm);
    $stmt->bindParam(':cablevga', $cablevga);
    $stmt->bindParam(':cablekvm', $cablekvm);
    $stmt->bindParam(':displayport', $displayport);
    $stmt->bindParam(':conector14', $conector14);
    $stmt->bindParam(':mousepad', $mousepad);
    $stmt->bindParam(':notaCPU', $nota_final);
    $stmt->bindParam(':fregis', $fecha_actual);
    
    // Ejecutar
    if($stmt->execute()) {
        $id_insertado = $connect->lastInsertId();
        
        // ENVIAR CORREO DE NOTIFICACIÓN (opcional - descomentar para producción)
        /*
        $para = "ingeniero.jr@empresa.com,ingeniero.sr@empresa.com";
        $asunto = "🚨 REPORTE RÁPIDO: $equipo - " . strtoupper($estado);
        $mensaje = "NUEVO REPORTE GENERADO\n\n" .
                   "Equipo: $equipo\n" .
                   "Estado: " . ($estado === 'ok' ? '✅ TODO OK' : ($estado === 'error' ? '❌ FALLA' : '⚠️ PARCIAL')) . "\n" .
                   "Técnico: $tecnico\n" .
                   "Fecha: $fecha_actual $hora_actual\n" .
                   "Notas: $nota_final\n\n" .
                   "--\n" .
                   "Sistema Automático de Reportes";
        
        // Cabeceras para correo en español
        $headers = "From: sistema_reportes@empresa.com\r\n" .
                   "Content-Type: text/plain; charset=UTF-8\r\n";
        
        mail($para, $asunto, $mensaje, $headers);
        */
        
        // Respuesta exitosa
        echo json_encode([
            'success' => true,
            'id' => $id_insertado,
            'equipo' => $equipo,
            'estado' => $estado,
            'fecha' => $fecha_actual,
            'hora' => $hora_actual,
            'mensaje' => 'Reporte guardado exitosamente'
        ]);
        
    } else {
        echo json_encode([
            'success' => false, 
            'error' => 'Error al ejecutar la consulta',
            'info' => $stmt->errorInfo()
        ]);
    }
    
} catch(PDOException $e) {
    echo json_encode([
        'success' => false, 
        'error' => 'Excepción PDO: ' . $e->getMessage(),
        'codigo' => $e->getCode()
    ]);
}
?>