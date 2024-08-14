<?php
// Iniciar sesión
session_start();

// Verificar si no hay una sesión activa
if (!isset($_SESSION['usuario'])) {
    // No hay una sesión activa, redirigir al usuario a la página de inicio de sesión
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4y05f0bPCUYBmoVCTHZBAh7Vt8Tf-8yG5Vg&usqp=CAU" type="image/x-icon">
    <link rel="stylesheet" href="roles.css">
    <title>Agente</title>
</head>
<body>

    <div class="logout">
        <a class="salir" href="cerrar_sesion.php"><i id="salir" class='bx bx-log-out-circle'></i>Cerrar Sesion</a>
    </div>

    <div class="sidebar">
       <ul>
           <li>Home</li>
           <li>Sobre nosotros</li>
           <li>Ventajas</li>
           <li>Rendimiento</li>
           <li>Opciones</li>
       </ul>
   </div>

   <h1>¡Hola! <br> Bienvenido al perfil de agente.</h1>

</body>
</html>