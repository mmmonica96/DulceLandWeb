<?php
session_start();
if (isset($_SESSION['user_email'])) {
    header("Location: init.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/init.css" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="../css/register.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="../js/darkMode.js" defer></script>
  <title>Registro - Pastelería DulceLand</title>
</head>
<body>

<!-- Header -->
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

<!-- Registro -->
<main class="contenido">
  <div class="form-container">
    <h2>Registro de usuario</h2>
    
    <form action="../connection/controller.php" method="POST">
      <input type="hidden" name="register" value="1">

      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" required />

      <label for="email">Correo</label>
      <input type="email" id="email" name="email" required />

      <label for="password">Contraseña</label>
      <input type="password" id="password" name="password" required />

      <button type="submit">Registrarse</button>
    </form>
  </div>
</main>

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

