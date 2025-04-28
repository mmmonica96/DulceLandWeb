<?php
include 'db.php';

//login
//create a connection to the database
$conn = new mysqli("localhost", "root", "", "dulceland");

//verify connection
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

//get the form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

//prepare query to avoid SQL injections
$sql = "SELECT * FROM customers WHERE name = ? AND email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);
$stmt->execute();
$result = $stmt->get_result();

//check if the user exists
if ($result->num_rows > 0) {
    header("Location: ../html/init.html");
    exit();
} else {
    echo " Usuario o contraseña incorrectos";
}

//REGISTER
if (isset($_POST['customers'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificamos si ya existe el correo
    $check = $conn->prepare("SELECT idcustomers FROM user WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "El usuario ya está registrado.";
        exit();
    }

    // Insertar nuevo usuario
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../html/init.html");
        exit;
    } else {
        echo "Usuario no registrado. Error: " . $conn->error;
    }

    $stmt->close();
}

//contact
if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //insertar menssaje 
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