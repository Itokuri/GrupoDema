<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "derma2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Validar y sanitizar datos recibidos
$clienteID = isset($_POST['clienteID']) ? intval($_POST['clienteID']) : 0;
$fechaPedido = isset($_POST['fechaPedido']) ? $_POST['fechaPedido'] : '';



$query = "INSERT INTO pedido (clienteID, fechaPedido) VALUES (?, ?)";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("si", $clienteID, $fechaPedido);

    $stmt->execute();

    // Verificar si la inserción fue exitosa
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => 'Pedido agregado correctamente']);
    } else {
        echo json_encode(['error' => 'Error al agregar pedido: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Error en la preparación de la consulta']);
}

mysqli_close($conn);
?>
