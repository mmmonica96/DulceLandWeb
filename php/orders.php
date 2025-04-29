<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mis pedidos - Pastelería DulceLand</title>
  <link rel="stylesheet" href="../css/init.css" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="../css/orders.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="../js/darkMode.js" defer></script>
  <script src="../js/orders.js" defer></script>
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
        <li><a href="formContact.php">Contacto</a></li>
        <li><a href="map.php">¿Dónde encontrarnos?</a></li>
        <li><a href="faq.php">Preguntas frecuentes</a></li>
        <?php if (isset($_SESSION['user_email'])): ?>
          <li><a href="../connection/logout.php">Cerrar sesión</a></li>
        <?php else: ?>
          <li><a href="login.php">Inicio de sesión</a></li>
          <li><a href="register.php">Registro</a></li>
        <?php endif; ?>
        <li><span id="toggleDarkMode" class="dark-icon"><i class="fas fa-moon"></i></span></li>
      </ul>
    </nav>
  </div>

  <!-- Main content -->
  <div class="main-content">
    <h1>Mis pedidos</h1>

    <table id="ordersTable" border="1" cellspacing="0" cellpadding="10">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Fecha</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Ejemplos de pedidos -->
        <tr>
          <td>Pastel de cumpleaños</td>
          <td>25,00€</td>
          <td>28-04-2025</td>
          <td>Tramitado</td>
          <td>
            <button
              onclick="generatePDF(this)"
              data-product="Pastel de cumpleaños"
              data-price="25,00€"
              data-date="28-04-2025"
              data-status="Tramitado"
            >
              Generar factura
            </button>
          </td>
        </tr>
        <tr>
          <td>Cupcakes decorados</td>
          <td>12,00€</td>
          <td>27-04-2025</td>
          <td>Pendiente de recogida</td>
          <td>
            <button
              onclick="generatePDF(this)"
              data-product="Cupcakes decorados"
              data-price="12,00€"
              data-date="27-04-2025"
              data-status="Pendiente de recogida"
            >
              Generar factura
            </button>
          </td>
        </tr>
      </tbody>
    </table>
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
