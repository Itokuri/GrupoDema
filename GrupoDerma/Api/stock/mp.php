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

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
$precio = isset($_POST['precio']) ? floatval($_POST['precio']) : 0;

$query = "INSERT INTO materiaPrima (precio, nombre) VALUES (?, ?)";
$stmt = $conn->prepare($query);

// Verificar la preparación de la consulta
if ($stmt === false) {
    echo json_encode(['error' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit;
}

// Enlazar parámetros
$stmt->bind_param("ds", $precio, $nombre);  // "d" para double (precio), "s" para string (nombre)

// Ejecutar la consulta
$result = $stmt->execute();

// Verificar si la inserción fue exitosa
if ($result) {
    echo json_encode(['success' => 'materiaPrima agregado correctamente']);
} else {
    echo json_encode(['error' => 'Error al agregar cliente: ' . $stmt->error]);
}

// Cerrar recursos
$stmt->close();
$conn->close();
?>
