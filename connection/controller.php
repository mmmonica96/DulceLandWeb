<?php
session_start();
ob_start();
include 'db.php';

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "dulceland");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Datos del formulario
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// LOGIN
if (isset($_POST['login'])) {
    if (empty($email) || empty($password)) {
        die("Email y contraseña son requeridos.");
    }

    $stmt = $conn->prepare("SELECT idcustomers, name FROM customers WHERE email = ? AND password = ?");
    if (!$stmt) {
        die("Error al preparar (login): " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['idcustomers'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $email;

        header("Location: ../html/orders.html");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
        exit();
    }
}

// REGISTER
if (isset($_POST['register'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        die("Nombre, Email y Contraseña son obligatorios.");
    }

    // Verificar si el usuario ya existe
    $check = $conn->prepare("SELECT idcustomers FROM customers WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "El usuario ya está registrado.";
        exit();
    }

    // Insertar nuevo usuario
    $stmt = $conn->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        $userId = $stmt->insert_id;
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

        header("Location: ../html/init.html");
        exit();
    } else {
        echo "Error al registrar usuario: " . $conn->error;
        exit();
    }
}

// CONTACT
if (isset($_POST['contact'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($name) || empty($email) || empty($message)) {
        die("Todos los campos del formulario de contacto son requeridos.");
    }

    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: ../html/orders.html");
        exit();
    } else {
        echo "Error al enviar mensaje: " . $conn->error;
        exit();
    }
}

$conn->close();
ob_end_flush();
?>