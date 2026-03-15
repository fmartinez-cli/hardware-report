<?php
// config.php — configuration template
// Copy this file to config.php and fill in your values
// config.php is excluded from version control (.gitignore)

// Database
define('DB_HOST', 'your_db_host');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
define('DB_NAME', 'hardware_report');

// Application URLs
// Set both to the same value if you don't use internal/external routing
define('APP_URL_INTERNAL', 'http://your-internal-server/hardware-report/datatables2.php');
define('APP_URL_EXTERNAL', 'http://your-external-server/hardware-report/datatables2.php');

// Internal network ranges (comma-separated CIDR-style wildcards)
// Used to detect whether a visitor is on the LAN or external
define('INTERNAL_RANGES', serialize(['192.168.*.*', '10.0.*.*']));

// Contact / branding
define('APP_TITLE', 'Hardware Report System');
define('APP_FOOTER', '2024 Hardware Report System');
define('SUPPORT_EMAIL', 'support@example.com');