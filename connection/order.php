<?php
session_start();
header('Content-Type: application/json');

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "dulceland");
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "DB connection failed"]);
    exit;
}

// Verifica si el usuario está logueado
if (!isset($_SESSION['user_email'])) {
    echo json_encode(["success" => false, "error" => "No estás logueado"]);
    exit;
}

// Obtener ID del usuario desde su email
$email = $_SESSION['user_email'];
$getUser = $conn->prepare("SELECT idcustomers FROM customers WHERE email = ?");
$getUser->bind_param("s", $email);
$getUser->execute();
$result = $getUser->get_result();
$user = $result->fetch_assoc();
if (!$user) {
    echo json_encode(["success" => false, "error" => "Usuario no encontrado"]);
    exit;
}
$idusuario = $user['idcustomers'];

// Recibir JSON del carrito
$input = json_decode(file_get_contents("php://input"), true);
$detail = $input['detail'] ?? '';
$total = $input['total'] ?? 0.0;

// Validar datos
if (empty($detail) || $total <= 0) {
    echo json_encode(["success" => false, "error" => "Datos de compra inválidos"]);
    exit;
}

// Guardar pedido
$stmt = $conn->prepare("INSERT INTO `order` (`name`, `idusuario`, `detail`, `total`) VALUES (?, ?, ?, ?)");
$orderName = "Pedido web";
$stmt->bind_param("sisd", $orderName, $idusuario, $detail, $total);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>

