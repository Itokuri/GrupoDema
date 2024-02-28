<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>

    <header>
        <nav>
            <div class="logo">
                <h1> Brewtiful </h1>
            </div>
        </nav>

        <nav class="nav2" >
            <li> <a href="#">Inicio</a></li>
            <li> <a href="#">Locales</a></li>
            <li> <a href="#">Nuestros Productos</a></li>
            <li> <a href="#"> Nosotros</a></li>
            <li> <a href="#"> Contacto</a></li>
         </nav>

    </header>

    <section class="form-register">
    <h4>Bienvenido!</h4>
    <form action="registrar.php" method="POST">
        <div class="input-wrapper">
            <input class="controls" type="text" name="nombre" id="nombre" required placeholder="Ingresa tu nombre">
        </div>
        <div class="input-wrapper">
            <input class="controls" type="text" name="apellido" id="apellido" required placeholder="Ingresa tu apellido">
        </div>
        <div class="input-wrapper">
            <input class="controls" type="email" name="mail" id="mail" required placeholder="Ingresa tu correo electrónico">
        </div>
        <div class="input-wrapper">
            <input class="controls" type="password" name="contrasena" id="contrasena" required placeholder="Ingresa tu contraseña">
        </div>
        <div class="input-wrapper">
            <input class="controls" type="password" name="confcontrasena" id="confcontrasena" required placeholder="Confirma tu contraseña">
        </div>
        <p>¿Ya tienes cuenta? <a href="iniciosesion.php" class="registrate">Inicia Sesion</a></p>
        <input class="botons" type="submit" name="registro" value="Registrarse">
    </form>
</section>


<footer class="footer">
        <div class="footer-container">
            <div class="footer-row">
               
                <div class="footer-links">
                    <h4> Sobre Nosotros </h4>
                    <ul>
                        <li> <a href="#"> Nosotros</a></li>
                        <li> <a href="#"> Politica de Nosotros</a></li>
                        <li> <a href="#"> Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4> Contactate </h4>
                    <ul>
                        <li> <a href="#"> Correo</a></li>
                        <li> <a href="#"> Preguntas Frecuentes </a></li>
                        <li> <a href="#"> Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4> Nuestras Redes </h4>
                    <div class="social-links">
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <?php 
    include("registrar.php")
    ?>


</body>
</html>