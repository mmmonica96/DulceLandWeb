<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>¿Dónde encontrarnos? - Pastelería DulceLand</title>
  <link rel="stylesheet" href="../css/init.css" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="../css/map.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="../js/darkMode.js" defer></script>
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
        <span id="toggleDarkMode" class="dark-icon"><i class="fas fa-moon"></i></span>
      </ul>
    </nav>
  </div>

  <!-- Mapa con Leaflet -->
  <div id="map"></div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    window.dispatchEvent(new Event('resize'));
    const map = L.map('map').setView([36.9211, -6.0714], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([36.9211, -6.0714])
      .addTo(map)
      .bindPopup('Pastelería DulceLand<br>Calle Sevilla, 25, Lebrija')
      .openPopup();

    // 🔄 Corregir render
    window.addEventListener("load", () => {
      setTimeout(() => map.invalidateSize(), 300);
    });
  });
</script>


  <!-- Información de contacto -->
  <div class="info-contacto">
    <h3>Pastelería DulceLand</h3>
    <p><i class="fas fa-map-marker-alt"></i> C. Sevilla, 25, 41740 Lebrija, Sevilla</p>
    <p><i class="fas fa-phone-alt"></i> Teléfono: 954 123 456</p>
    <p><i class="fas fa-clock"></i> Horario de apertura:</p>
    <ul>
      <li>Lunes - viernes: 9:30 – 13:30 / 17:00 – 20:00</li>
      <li>Sábado: 10:00 - 13:30</li>
      <li>Domingo: Cerrado</li>
    </ul>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Pastelería DulceLand - Todos los derechos reservados</p>
    <div class="rrss">
      <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
      <a href="https://www.telegram.org/" target="_blank"><i class="fab fa-telegram-plane"></i></a>
    </div>
  </footer>

</body>
</html>
