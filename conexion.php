<?php
// conexion.php — database connection
// Credentials are loaded from config.php (excluded from version control)

$config_file = dirname(__FILE__) . '/config.php';

if (!file_exists($config_file)) {
    die('<div style="font-family:sans-serif;padding:2rem;color:#dc3545;">
        <h4>Configuration file not found</h4>
        <p>Copy <code>config.example.php</code> to <code>config.php</code> and fill in your database credentials.</p>
    </div>');
}

require_once $config_file;

try {
    $connect = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
    );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit("Connection error: " . $e->getMessage());
}
?>