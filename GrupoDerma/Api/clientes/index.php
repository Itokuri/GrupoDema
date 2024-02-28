<?php
// index.php - /api/clientes

include '../../includes/db_connection.php';

// Consulta para obtener la lista de clientes
$query = "SELECT * FROM Clientes";
$result = mysqli_query($conn, $query);

// Verificar si hay resultados
if ($result) {
    $clientes = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($clientes);
} else {
    echo json_encode(['error' => 'Error al obtener la lista de clientes']);
}

mysqli_close($conn);
?>