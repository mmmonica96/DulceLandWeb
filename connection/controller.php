<?php
ob_start();
include 'db.php';
$conn = new mysqli("localhost", "root", "", "dulceland");

<<<<<<< HEAD
// Verify connection
=======
>>>>>>> origin/monica
if ($conn->connect_error) {
    die();
}

<<<<<<< HEAD
// Get form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

=======
>>>>>>> origin/monica
// LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        die("Email and Password are required.");
    }

    // Debug: Ver qué email y password se están enviando
    echo "Email enviado: '$email'<br>";
    echo "Password enviado: '$password'<br>";

    $stmt = $conn->prepare("SELECT idcustomers FROM customers WHERE email = ? AND password = ?");
    if (!$stmt) {
        die("Prepare failed (login): (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        echo "Usuario encontrado. Redireccionando...";
        header("Location: ../html/init.html");
        exit();
    } else {
        echo "Usuario NO encontrado.";
        exit();
    }
}

// REGISTER
if (isset($_POST['register'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($name) || empty($password)) {
        die("Name, Email and Password are required.");
    }

    $check = $conn->prepare("SELECT idcustomers FROM customers WHERE email = ?");
    if (!$check) {
        die("Prepare failed (register check): (" . $conn->errno . ") " . $conn->error);
    }

    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "The user is already registered.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO customers (name, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed (register insert): (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: ../html/init.html");
        exit();
    } else {
        echo "User not registered. Error: " . $conn->error;
        exit();
    }
}

// CONTACT
if (isset($_POST['contact'])) {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($name) || empty($email) || empty($message)) {
        die("All fields are required for contact.");
    }

    $stmt = $conn->prepare("INSERT INTO contact (name, email, message) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed (contact): (" . $conn->errno . ") " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: ../html/init.html");
        exit();
    } else {
        echo "Error sending message: " . $conn->error;
        exit();
    }
}

// Close connection
$conn->close();
ob_end_flush(); // Flush output buffer
<<<<<<< HEAD

?>
=======
?>
>>>>>>> origin/monica
