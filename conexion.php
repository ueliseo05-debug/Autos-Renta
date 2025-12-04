<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'tu_usuario');      // Cambia por tu usuario de MySQL
define('DB_PASS', 'tu_contraseña');   // Cambia por tu contraseña de MySQL
define('DB_NAME', 'rentacar_db');

// Conectar a la base de datos
function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    // Establecer charset
    $conn->set_charset("utf8");
    
    return $conn;
}

// Cerrar conexión
function closeDB($conn) {
    $conn->close();
}
?>