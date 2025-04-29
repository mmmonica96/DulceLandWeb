<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/init.css" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="../js/darkMode.js" defer></script>
  <title>Inicio - Pastelería DulceLand</title>
</head>
<body>

  <!-- 🟣 Oferta -->
  <div class="offer-text-container">
    <span>¡Oferta en todos nuestros productos sin gluten! ¡Haz tu pedido!</span>
  </div>

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
        <li><span id="toggleDarkMode" class="dark-icon"><i class="fas fa-moon"></i></span></li>
      </ul>
    </nav>
  </div>

  <!-- Productos destacados -->
  <section class="featured-products">
    <h2>¡Descubre nuestros productos!</h2>

    <div class="gallery">
      <div class="product">
        <img src="../img/pastel.jpg" alt="Pastel de cumpleaños" />
        <p>Pastel de cumpleaños personalizado</p>
      </div>
      <div class="product">
        <img src="../img/pastel1.jpg" alt="Pastel sin lactosa" />
        <p>Pastel de cumpleaños sin lactosa</p>
      </div>
      <div class="product">
        <img src="../img/cupcakes.jpg" alt="Cupcakes variados" />
        <p>Cupcakes decorados</p>
      </div>
    </div>

    <div class="gallery">
      <div class="product">
        <img src="../img/cup.png" alt="Cupcakes sin azúcar" />
        <p>Cupcakes sin azúcar</p>
      </div>
      <div class="product">
        <img src="../img/cookies.jpg" alt="Galletas artesanales" />
        <p>Galletas artesanales</p>
      </div>
      <div class="product">
        <img src="../img/cookie.jpg" alt="Galletas sin gluten" />
        <p>Galletas artesanales sin gluten</p>
      </div>
    </div>
  </section>

  <!-- ¿Por qué elegirnos? -->
  <section class="whyChoose">
    <h2>¿Por qué elegirnos?</h2>
    <div class="gallery">
      <div class="product">
        <img src="../img/masa.jpg" alt="Productos de calidad" />
        <p>Productos artesanos</p>
      </div>
      <div class="product">
        <img src="../img/bizum.jpg" alt="Entrega rápida" />
        <p>Pagos seguros</p>
      </div>
      <div class="product">
        <img src="../img/entrega.png" alt="Satisfacción garantizada" />
        <p>Satisfacción garantizada</p>
      </div>
    </div>
  </section>

  <!-- Horario -->
  <section class="horary">
    <h2>Horarios</h2>
    <div class="timeTable">
      <p>Lunes - viernes: 9:30 – 13:30 / 17:00 – 20:00</p>
      <p>Sábado: 10:00 - 13:30</p>
      <p>Domingo: Cerrado</p>
    </div>
  </section>

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
