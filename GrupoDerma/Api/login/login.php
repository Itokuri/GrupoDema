<?php
// Conexion con la base de datos
require 'conexion.php';

session_start();


// Validar que el formulario y el botón "login" hayan sido presionados
if (isset($_POST['login'])) {

    // Obtener los valores del formulario y aplicar validaciones

    $mail = $conexion->real_escape_string($_POST['mail']);
    $contrasena = $conexion->real_escape_string($_POST['contrasena']);

 
    // Validar los campos del formulario
    if ($contrasena == "" || strlen($contrasena) < 4) {
        echo "La contraseña no puede estar vacía y debe tener al menos 4 caracteres.";
    } elseif ($mail == "" || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "Ingrese un correo electrónico válido.";
    } else {
        // Consulta a la base de datos
        $sql = " SELECT * FROM signup where mail= '$mail' and '$contrasena' "; 


        $resultado = mysqli_query($conexion, $sql);
        
        // Verificar cuantas filas se recuperaron con el resultado
        $filas = mysqli_num_rows($resultado);

        // Verificar si el usuario existe
        if ($filas != 0) {
            // El usuario existe, redirigir a la página de inicio
            header("Location: index.php");
            exit();
        } else {
            // El usuario no existe, mostrar mensaje de error
            echo "Usuario inválido, verifique sus datos. Si no tiene una cuenta, le invitamos a registrarse.";
            echo "Error: " . mysqli_error($conexion);
        }
    }
}

mysqli_close($conexion);
?>
