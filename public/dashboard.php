<?php
session_start();
include('../src/config/conexion.php');

// Verifica si el usuario está autenticado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

// Obtén el rol del usuario
$rol = $_SESSION['rol'];

// Comienza a construir el contenido del dashboard
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Asegúrate de incluir Bootstrap u otro CSS -->
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>

        <?php if ($rol == 1): // Rol administrativo ?>
            <h2>Administrativo</h2>
            <div>
                <h3>Gestión de Pedidos</h3>
                <!-- Aquí puedes añadir opciones para ver, editar, o eliminar pedidos -->
                <a href="gestionar_pedidos.php" class="btn btn-primary">Gestionar Pedidos</a>
                <h3>Estadísticas de Ventas</h3>
                <a href="estadisticas.php" class="btn btn-primary">Ver Estadísticas</a>
            </div>
        <?php else: // Rol de cliente ?>
            <h2>Cliente</h2>
            <div>
                <h3>Mis Pedidos</h3>
                <a href="mis_pedidos.php" class="btn btn-primary">Ver Mis Pedidos</a>
                <h3>Realizar Nuevo Pedido</h3>
                <a href="nuevo_pedido.php" class="btn btn-primary">Nuevo Pedido</a>
            </div>
        <?php endif; ?>

        <div>
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>
