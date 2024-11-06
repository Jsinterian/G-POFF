<?php
include('../src/config/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verificar si el email ya existe
    $checkEmailQuery = "SELECT * FROM usuarios WHERE email = :email";
    $checkStmt = $pdo->prepare($checkEmailQuery);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        echo "El email ya está registrado. Por favor, utiliza otro.";
    } else {
        // Consulta SQL con marcadores de posición
        $query = "INSERT INTO usuarios (nombre, email, usuario, password) VALUES (:nombre, :email, :usuario, :password)";
        $stmt = $pdo->prepare($query);

        // Vinculación de parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':password', $password);

        // Manejo de errores
        try {
            // Intentar ejecutar la inserción
            if ($stmt->execute()) {
                echo "Registro exitoso. Ahora puedes iniciar sesión.";
                header("Location: index.php"); // Redirige al inicio de sesión o donde desees
                exit;
            }
        } catch (PDOException $e) {
            // Manejo de errores
            error_log("Error al registrar usuario: " . $e->getMessage());
            echo "Ocurrió un error al procesar tu solicitud. Intenta nuevamente más tarde.";
        }
    }
}
?>
