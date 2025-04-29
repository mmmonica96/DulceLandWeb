<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/init.css" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="../css/faq.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="../js/darkMode.js" defer></script>
  <title>Preguntas frecuentes - Pastelería DulceLand</title>
</head>
<body>
<!-- Banner -->
<header class="banner">
  <img src="../img/banner.png" alt="Pastelería DulceLand" />
</header>

<!-- Navbar -->
<div class="menu">
  <nav class="navegacion">
    <ul>
      <li><a href="init.php">Inicio</a></li>
      <li><a href="shop.php">Tienda</a></li>

      <?php if (isset($_SESSION['user_email'])): ?>
        <li><a href="../connection/logout.php">Cerrar sesión</a></li>
      <?php else: ?>
        <li><a href="login.php">Inicio de sesión</a></li>
        <li><a href="register.php">Registro</a></li>
      <?php endif; ?>

      <li><a href="formContact.php">Contacto</a></li>
      <li><a href="map.php">¿Dónde encontrarnos?</a></li>
      <li><a href="faq.php">Preguntas frecuentes</a></li>
      <span id="toggleDarkMode" class="dark-icon">
        <i class="fas fa-moon"></i>
      </span>
    </ul>
  </nav>
</div>

<div class="faq-container">
  <div class="faq-box">
    <h3>La pastelería</h3>
    <ul>
      <li><strong>¿Qué tipo de productos venden?</strong> Ofrecemos pasteles, cupcakes, galletas y productos sin gluten.</li>
      <li><strong>¿Puedo hacer pedidos personalizados?</strong> Sí, puedes personalizar tu pedido desde la tienda o desde la web.</li>
      <li><strong>¿Cómo funciona el sistema de recogida?</strong> Haces tu pedido y pago online, y luego solo vienes a recogerlo.</li>
      <li><strong>¿Necesito registrarme para comprar?</strong> No es obligatorio, pero al registrarte puedes guardar tus pedidos y recibir ofertas.</li>
      <li><strong>¿Con cuánto tiempo de anticipación debo hacer mi pedido?</strong> Al menos con 24 horas con antelación.</li>
      <li><strong>¿Dónde se encuentra la tienda física?</strong> Puedes ver la ubicación exacta en la sección “¿Dónde encontrarnos?”.</li>
      <li><strong>¿Puedo cancelar o modificar un pedido?</strong> Sí, contáctanos con al menos doce horas antes de la recogida.</li>
      <li><strong>¿Qué horarios manejan?</strong> Lunes a viernes 9:30–13:30 y 17:00–20:00. Sábados de 10:00–13:30.</li>
      <li><strong>¿Tienen productos sin azúcar o sin gluten?</strong> Sí, tenemos variedad disponible en la tienda.</li>
      <li><strong>¿Los productos se pueden enviar a domicilio?</strong> No, sólo recogida en tienda.</li>
    </ul>
  </div>

  <div class="faq-box">
    <h3>Método de pago</h3>
    <ul>
      <li><strong>¿Qué métodos de pago aceptan?</strong> Aceptamos tarjetas de crédito, débito y PayPal.</li>
      <li><strong>¿El pago en línea es seguro?</strong> Sí, utilizamos plataformas de pago seguras.</li>
      <li><strong>¿Puedo pagar al recoger el pedido?</strong> Sí, también aceptamos pagos en tienda.</li>
      <li><strong>¿Recibo una confirmación del pedido?</strong> Sí, recibirás un correo de confirmación.</li>
      <li><strong>¿Puedo ver el estado de mi pedido?</strong> Sí, desde tu cuenta de usuario.</li>
      <li><strong>¿Emiten factura?</strong> Sí, puedes solicitarla.</li>
      <li><strong>¿Hay ofertas o descuentos?</strong> Sí, revisa nuestra web para promociones.</li>
      <li><strong>¿Cómo contacto con soporte?</strong> A través del formulario de contacto o redes sociales.</li>
      <li><strong>¿Puedo guardar mis datos de pago?</strong> No almacenamos datos de pago.</li>
      <li><strong>¿Tienen sistema de puntos o fidelización?</strong> Pronto lanzaremos un sistema de recompensas.</li>
    </ul>
  </div>
</div>

<!-- Footer -->
<footer>
  <p>&copy; 2025 Pastelería DulceLand - Todos los derechos reservados</p>
  <div class="rrss">
    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
  </div>
</footer>
</body>
</html>
