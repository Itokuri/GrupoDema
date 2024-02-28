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
$idMP = isset($_POST['idMP']) ? $_POST['idMP'] : NULL;
$idPT = isset($_POST['idPT']) ? $_POST['idPT'] : NULL;
$cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;


$query = "INSERT INTO stock (idMP, idPT, cantidad) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);

if ($stmt) {

    $stmt->bind_param("iii", $idMP, $idPT, $cantidad);
    $stmt->execute();


    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => 'Registro de stock agregado correctamente']);
    } else {
        echo json_encode(['error' => 'Error al agregar registro de stock: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Error en la preparación de la consulta']);
}

mysqli_close($conn);
?>
