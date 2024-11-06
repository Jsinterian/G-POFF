<?php
session_start();
include('../src/config/conexion.php'); // Asegúrate de que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para obtener el id y la contraseña del usuario
    $query = "SELECT id, password FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);

    // Manejo de errores
    try {
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id_usuario'] = $user['id'];
            header("Location: dashboard.php"); // Redirige a la página principal
            exit;
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        // Manejo de errores
        error_log("Error al iniciar sesión: " . $e->getMessage());
        echo "Ocurrió un error al procesar tu solicitud. Intenta nuevamente más tarde.";
    }
}
?>

