<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Consultar la base de datos con sentencia preparada
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Obtener la fila del resultado
    $fila = $resultado->fetch_assoc();

    // Verificar si ya tiene un token activo
    if (empty($fila['token'])) {
        // Verificar la contraseña utilizando password_verify
        if (password_verify($contraseña, $fila['contraseña'])) {
            // Contraseña válida, procede con la lógica de inicio de sesión
            session_start();

            // Generar y almacenar un token único si no tiene uno activo
            $token = uniqid('', true);

            $_SESSION['token'] = $token;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $fila['rol'];

            // Actualiza el token en la base de datos
            $stmt_update_token = $conn->prepare("UPDATE usuarios SET token = ? WHERE usuario = ?");
            $stmt_update_token->bind_param("ss", $token, $usuario);
            $stmt_update_token->execute();
            $stmt_update_token->close();

            // Incluir la validación del token
            include 'Token.php';

            // Mostrar una alerta indicando que el token se ha generado
            echo "<script>alert('Token generado correctamente.');window.location.href='index.html'</script>";

            // Redirigir según el rol (agregaremos esto más adelante)
            // ...
        } else {
            // Contraseña incorrecta
            echo "<script>alert('Ups! Contraseña y/o usuario incorrecto.');window.location.href='index.html'</script>";
        }
    } else {
        // El usuario ya tiene un token
        echo "<script>alert('Lo siento 😪 Ya tienes una sesión activa.');window.location.href='index.html'</script>";
    }
} else {
    // No se encontró un usuario con el nombre proporcionado
    echo "<script>alert('Ups! Contraseña y/o usuario incorrecto.');window.location.href='index.html'</script>";
}

// Cerrar la conexión
$conn->close();
?>
