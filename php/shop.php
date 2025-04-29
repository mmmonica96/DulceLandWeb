<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "dulceland");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/init.css" />
  <link rel="stylesheet" href="../css/shop.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="../js/darkMode.js" defer></script>
  <script src="../js/shop.js" defer></script>
  <title>Tienda - Pastelería DulceLand</title>
</head>
<body>
  <header class="banner">
    <img src="../img/banner.png" alt="Pastelería DulceLand" />
  </header>

  <div class="menu">
    <nav class="navegacion">
      <ul>
        <li><a href="init.php">Inicio</a></li>
        <li><a href="shop.php">Tienda</a></li>
        <li><a href="formContact.php">Contacto</a></li>
        <li><a href="map.php">¿Dónde encontrarnos?</a></li>
        <li><a href="faq.php">Preguntas frecuentes</a></li>
        <li><a href="orders.php">Mis pedidos</a></li>
        <?php if (isset($_SESSION['user_email'])): ?>
          <li><a href="../connection/logout.php">Cerrar sesión</a></li>
        <?php else: ?>
          <li><a href="login.php">Inicio de sesión</a></li>
          <li><a href="register.php">Registro</a></li>
        <?php endif; ?>
        <li><a href="javascript:void(0);" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
        <li><span id="toggleDarkMode" class="dark-icon"><i class="fas fa-moon"></i></span></li>
      </ul>
    </nav>
  </div>

  <div class="contenido" style="position: relative;">
    <section class="store-header">
      <h2>¡Últimas novedades!</h2>
    </section>

    <main class="store-container">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="product-card">
          <img src="../img/<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" />
          <h3><?php echo htmlspecialchars($row['name']); ?></h3>
          <p>&nbsp;</p>
          <div class="price">
            <strong><?php echo number_format($row['price'], 2); ?> €</strong>
          </div>
          <div class="actions">
            <button class="decrease">-</button>
            <input type="text" value="1" />
            <button class="increase">+</button>
            <button class="buy"><i class="fa fa-shopping-basket"></i></button>
          </div>
        </div>
      <?php endwhile; ?>
    </main>

    <div id="cart-container" class="cart-container hidden">
      <h2>Carrito</h2>
      <div id="cart-items"></div>
      <div id="cart-total">Total: <span id="total-amount">0.00€</span></div>
      <div class="cart-buttons">
        <button onclick="checkoutCart()">Comprar</button>
        <button onclick="clearCart()">Vaciar Cesta</button>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Pastelería DulceLand - Todos los derechos reservados</p>
    <div class="rrss">
      <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.tiktok.com/" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
  </footer>
</body>
</html>
<?php $conn->close(); ?>
