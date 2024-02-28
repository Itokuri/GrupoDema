<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "grupoderma";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
$query = "SELECT ClienteID, Nombre, Deuda, historial_compras FROM Clientes";
$result = mysqli_query($conn, $query);

// Verificar si hay resultados
if ($result) {
    $informeClientes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($informeClientes);
} else {
    echo json_encode(['error' => 'Error al obtener el informe de clientes']);
}

mysqli_close($conn);
?>