<?php
// Konfiguracja serwera
define('_SERVER_NAME', 'localhost');
define('_SERVER_URL', 'http://' . _SERVER_NAME);

// Ścieżka aplikacji
define('_APP_ROOT', '/pai_us_26/zad3');
define('_APP_URL', _SERVER_URL . _APP_ROOT);
define('_ROOT_PATH', dirname(__FILE__));
function out($param) {
    if (isset($param)) {
        echo htmlspecialchars($param);
    }
}
?>