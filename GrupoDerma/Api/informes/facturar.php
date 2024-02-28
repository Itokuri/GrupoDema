<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "derma2";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    echo json_encode(['error' => 'Error de conexión a la base de datos: ' . $conn->connect_error]);
    exit;
}

$idPedido = isset($_POST['idPedido']) ? intval($_POST['idPedido']) : 0;
$idProducto = isset($_POST['idProducto']) ? mysqli_real_escape_string($conn, $_POST['idProducto']) : 0;
$cantidadPT = isset($_POST['cantidadPT']) ? mysqli_real_escape_string($conn, $_POST['cantidadPT']) : 0;
$total = isset($_POST['total']) ? mysqli_real_escape_string($conn, $_POST['total']) : 0;

echo "$idProducto";
echo "$idPedido";
echo "$cantidadPT";
echo "$total";


$query = "INSERT INTO factura (idProducto, idPedido,  cantidadPT,  total) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Verificar la preparación de la consulta
if ($stmt === false) {
    echo json_encode(['error' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit;
}

// Enlazar parámetros
$stmt->bind_param("iiii", $idPedido, $idProducto, $cantidadPT,  $total);

// Ejecutar la consulta
$result = $stmt->execute();

// Verificar si la inserción fue exitosa
if ($result) {
    echo json_encode(['success' => 'Cliente agregado correctamente']);
} else {
    echo json_encode(['error' => 'Error al agregar cliente: ' . $stmt->error]);
}

// Cerrar recursos
$stmt->close();
$conn->close();
?>