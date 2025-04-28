<?php
include 'db.php';

// Crear conexión
$conn = new mysqli("localhost", "root", "", "dulceland");

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// LOGIN
if (isset($_POST['login'])) {
    $sql = "SELECT * FROM customers WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: ../html/init.html");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

// REGISTER
if (isset($_POST['register'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($name) || empty($password)) {
        die("One or more required fields are empty.");
    }

    // Prepare check query
    $check = $conn->prepare("SELECT idcustomers FROM customers WHERE email = ?");
    if (!$check) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "The user is already registered.";
        exit();
    }

    // Insert new customer
    $stmt = $conn->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../html/init.html");
        exit();
    } else {
        echo "User not registered. Error: " . $conn->error;
    }

    $stmt->close();
}




// CONTACT
if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Verificar que existe tabla contact antes de insertar
    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: ../html/init.html");
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }

    $stmt->close();
}

?>
