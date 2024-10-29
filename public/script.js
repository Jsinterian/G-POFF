 <script>
        // Función para mostrar un mensaje al realizar pedido
        document.querySelector("button").addEventListener("click", function() {
            window.location.href = "Pedidos.html"
        });
8*
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

    
    // Función para el botón "COMPRA"
    document.querySelector(".fa-shopping-basket").addEventListener("click", function() {
        window.location.href = "compra.html" // Redirige a una página de compra
    });

    // Función para el botón "TIENDA"
    document.querySelector(".fa-home").addEventListener("click", function() {
        window.location.href = "tienda.html" // Redirige a la página principal de la tienda
    });

    // Función para el botón "DOMICILIO"
    document.querySelector(".fa-motorcycle").addEventListener("click", function() {
        window.location.href = "domicilio.html" // Redirige a la página de entregas a domicilio
    });



</script>
    