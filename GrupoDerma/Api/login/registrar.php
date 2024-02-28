<?php
include("conexion.php");

if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $contrasena = $_POST['contrasena'];
    $confcontrasena = $_POST['confcontrasena'];

    // Verificar campos vacíos
    if (empty($nombre) || empty($apellido) || empty($mail) || empty($contrasena) || empty($confcontrasena)) {
        echo "Complete todos los campos.";
    } else {
        // Verificar si las contraseñas coinciden
        if ($contrasena == $confcontrasena) {
            // Consulta preparada para evitar la inyección de SQL
            $hashContrasena = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO signup(nombre, apellido, mail, contrasena) VALUES (?, ?, ?, ?)";

            // Inicializar la declaración
            $stmt = mysqli_stmt_init($conexion);

            // Preparar la consulta
            if (mysqli_stmt_prepare($stmt, $sql)) {
                // Vincular parámetros con los valores del usuario
                mysqli_stmt_bind_param($stmt, 'ssss', $nombre, $apellido, $mail, $contrasena);

                // Ejecutar la consulta preparada
                $resultado = mysqli_stmt_execute($stmt);

                if ($resultado) {
                    echo "Registro exitoso. ¡Bienvenido, $nombre!";
                } else {
                    echo "Verifique los datos insertados.<br>";
                    echo "Error: " . mysqli_error($conexion);
                }

                // Cerrar la consulta preparada
                mysqli_stmt_close($stmt);
            }
        } else {
            // Contraseñas no coinciden, mostrar mensaje de error
            echo "Las contraseñas no coinciden. Por favor, inténtelo de nuevo.";
        }
    }
}
?>
