<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "derma2";

try {
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    $idPT = isset($_POST['precio']) ? $_POST['precio'] : 0;
    $productoNombre = isset($_POST['productoNombre']) ? $_POST['productoNombre'] : '';

    // Continuar con la inserción
    $insertQuery = "INSERT INTO productoTerminado (productoNombre, precio) VALUES (?, ?)";
    $insertStmt = $conn->prepare($insertQuery);

    if ($insertStmt === false) {
        throw new Exception("Error en la preparación de la consulta de inserción: " . $conn->error);
    }

    $insertStmt->bind_param("si",$productoNombre, $precio );
    $insertStmt->execute();

    // Verificar si la inserción fue exitosa
    if ($insertStmt->affected_rows > 0) {
        echo json_encode(['success' => 'Producto Terminado agregado correctamente']);
    } else {
        echo json_encode(['error' => 'Error al agregar Producto Terminado']);
    }

    $insertStmt->close();
} catch (Exception $e) {
    echo json_encode(['error' => 'Excepción capturada: ' . $e->getMessage()]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>

