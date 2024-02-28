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
$idMP = isset($_POST['idMP']) ? intval($_POST['idMP']) : 0;
$fechaIngreso = isset($_POST['fechaIngreso']) ? $_POST['fechaIngreso'] : '';
$fechaEgreso = isset($_POST['fechaEgreso']) ? $_POST['fechaEgreso'] : '';

echo "id". $idMP .'<br>';
echo "ing". $fechaIngreso.'<br>';
echo "egre". $fechaEgreso.'<br>';

$query = "INSERT INTO movimientomp (idMP, fechaIngreso, fechaEgreso) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("iss", $idMP, $fechaIngreso, $fechaEgreso);
    $stmt->execute();

    // Verificar si la inserción fue exitosa
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => 'Movimiento agregado correctamente']);
    } else {
        echo json_encode(['error' => 'Error al agregar movimiento: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Error en la preparación de la consulta']);
}

mysqli_close($conn);

// Función para validar el formato de fecha
function validarFormatoFecha($fecha) {
    $date = DateTime::createFromFormat('Y-m-d', $fecha);
    return $date && $date->format('Y-m-d') === $fecha;
}
?>

