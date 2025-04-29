<?php
session_start();

// Eliminar todas las variables de sesión
$_SESSION = [];

// Destruir la sesión
session_destroy();

// Redirigir al inicio (o a login si prefieres)
header("Location: ../php/init.php");
exit();
?>
