<?php
// src/config/db.php

// Configuración de la base de datos
$host = 'localhost'; // Generalmente es localhost
$dbname = 'sistema_pedidos_camisas'; // Reemplaza con el nombre de tu base de datos
$username = 'root'; // Por defecto, el nombre de usuario de XAMPP es 'root'
$password = ''; // Por defecto, la contraseña está vacía

try {
    // Crear una nueva conexión a la base de datos utilizando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuración de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Puedes activar el modo de error para el desarrollo:
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    // En caso de error en la conexión
    die("Error de conexión: " . $e->getMessage());
}
?>