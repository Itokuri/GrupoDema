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

$Dni = isset($_POST['dni']) ? intval($_POST['dni']) : 0;
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conn, $_POST['apellido']) : '';
$telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';



$query = "INSERT INTO clientes (dni, nombre, apellido, mail, telefono) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Verificar la preparación de la consulta
if ($stmt === false) {
    echo json_encode(['error' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit;
}

// Enlazar parámetros
$stmt->bind_param("issss", $Dni, $nombre, $apellido, $email, $telefono);

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