<?php
// public/index.php

// Incluir el archivo de conexión
require_once '../src/config/db.php';

// Ahora puedes usar $pdo para hacer consultas a la base de datos
try {
    // Ejemplo de una consulta simple
    $stmt = $pdo->query("SELECT * FROM clientes"); // Cambia 'tu_tabla' por el nombre de una tabla existente

    // Obtener los resultados
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['correo']; // Cambia 'nombre_columna' por el nombre de una columna de tu tabla
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sublinter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .header-icons i {
            cursor: pointer;
            margin-left: 1rem;
            transition: color 0.3s ease;
        }
        .header-icons i:hover {
            color: #4B5563;
        }
    </style>
</head>
<body class="bg-white text-center">
    <header class="flex justify-between items-center p-4">
        <div class="flex items-center">
            <h1 class="text-3xl font-bold">SUBLINTER</h1>
            <div class="ml-2 flex space-x-1">
                <div class="w-4 h-4 bg-red-500"></div>
                <div class="w-4 h-4 bg-yellow-500"></div>
                <div class="w-4 h-4 bg-blue-500"></div>
                <div class="w-4 h-4 bg-gray-500"></div>
            </div>
        </div>
        <div class="header-icons flex items-center">
            <i class="fas fa-shopping-cart text-2xl" id="cart-icon"></i>
            <i class="fas fa-user-circle text-2xl" id="login-icon"></i>
        </div>
    </header>
    <main class="mt-16">
        <h2 class="text-5xl font-bold">BIENVENIDOS</h2>
        <div class="flex justify-center space-x-12 mt-8">
            <div class="text-center">
                <i class="fas fa-shopping-basket text-4xl"></i>
                <p class="mt-2">COMPRA</p>
            </div>
            <div class="text-center">
                <i class="fas fa-home text-4xl"></i>
                <p class="mt-2">TIENDA</p>
            </div>
            <div class="text-center">
                <i class="fas fa-motorcycle text-4xl"></i>
                <p class="mt-2">DOMICILIO</p>
            </div>
        </div>
        <button class="bg-red-600 text-white text-xl font-bold py-2 px-8 rounded-full mt-8">REALIZAR PEDIDO</button>
        <div class="mt-8 mapa-direccion">
            <i class="fas fa-map-marker-alt text-blue-600"></i>
            <p class="ml-2">C. 19 885-1860, SANTA ROSALÍA, 24920 DZITBALCHÉ, CAMP.</p>
        </div>
        <div class="mt-4 flex justify-center items-center space-x-4">
            <i class="fas fa-clock text-2xl"></i>
            <div id="reloj" class="bg-green-500 text-white py-1 px-4 rounded-full">00:00:00</div>
        </div>
    </main>
    <footer class="mt-16">
        <div class="flex justify-center items-center">
            <i class="fas fa-phone-alt text-4xl text-red-600"></i>
        </div>
        <p class="mt-2">CONTACTANOS</p>
        <hr class="my-4">
        <p>TIENDA DIGITAL SUBLINTER</p>
        <hr class="my-4">
        <p>REPORTE O SUGERENCIAS</p>
    </footer>

    <script>
        // Función para mostrar un mensaje al realizar pedido
        document.querySelector("button").addEventListener("click", function() {
            window.location.href = "Pedidos.html";
        });

        // Función para mostrar el reloj en vivo
        function mostrarHora() {
            const reloj = document.getElementById('reloj');
            const ahora = new Date();
            const horas = String(ahora.getHours()).padStart(2, '0');
            const minutos = String(ahora.getMinutes()).padStart(2, '0');
            const segundos = String(ahora.getSeconds()).padStart(2, '0');
            reloj.textContent = `${horas}:${minutos}:${segundos}`;
        }
        setInterval(mostrarHora, 1000);

        // Funcionalidad para los iconos
        document.getElementById('cart-icon').addEventListener('click', function() {
            window.location.href = "Pedidos.html";
        });

        document.getElementById('login-icon').addEventListener('click', function() {
            window.location.href = "login.html"; // Redirige a la página de entregas a domicilio
        });
    
    </script>
</body>
</html>