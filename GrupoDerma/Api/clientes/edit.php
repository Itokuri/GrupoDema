<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$database = "derma2";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar si se han recibido los datos esperados
if (isset($_POST['dniCliente'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email'])) {
    $dniCliente = $_POST['dniCliente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $query = "UPDATE clientes SET nombre=?, apellido=?, telefono=?, email=? WHERE dniCliente=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Enlazar parámetros
        mysqli_stmt_bind_param($stmt, "ssssi", $nombre, $apellido, $telefono, $email, $dniCliente);

        // Ejecutar la consulta
        $result = mysqli_stmt_execute($stmt);

        // Verificar si la actualización fue exitosa
        if ($result) {
            echo json_encode(['success' => 'Cliente actualizado correctamente']);
        } else {
            echo json_encode(['error' => 'Error al actualizar cliente: ' . mysqli_error($conn)]);
        }

        // Cerrar la consulta preparada
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['error' => 'Error en la preparación de la consulta: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['error' => 'Datos incompletos']);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>