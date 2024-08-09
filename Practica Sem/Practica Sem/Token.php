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

$usuario = $_SESSION['usuario'];  // Obtenemos el usuario de la sesión

// Obtener el token almacenado en la base de datos para el usuario actual
$stmt_select_token = $conn->prepare("SELECT token, rol FROM usuarios WHERE usuario = ?");
$stmt_select_token->bind_param("s", $usuario);
$stmt_select_token->execute();
$resultado_select_token = $stmt_select_token->get_result();

if ($resultado_select_token->num_rows > 0) {
    $fila_token = $resultado_select_token->fetch_assoc();
    $token_db = $fila_token['token'];  // Token almacenado en la base de datos
    $rol = $fila_token['rol'];  // Rol del usuario

    // // Mostrar información de depuración
    // echo "<script>alert('Token de la sesión: " . $_SESSION['token'] . "');</script>";
    // echo "<script>alert('Token de la base de datos: " . $token_db . "');</script>";

    // Comparar el token de la base de datos con el token de la sesión
    if ($_SESSION['token'] == $token_db) {
        // Tokens coinciden, la validación es exitosa
        if ($rol === 'agente') {
            echo "<script>alert('Token coincide. ¡Acceso permitido para Agente!'); window.location.href='Agente.php';</script>";
        } elseif ($rol === 'administrador') {
            echo "<script>alert('Token coincide. ¡Acceso permitido para Administrador!'); window.location.href='Admin.php';</script>";
        } else {
            // Rol no reconocido, muestra un mensaje de error
            echo "<script>alert('Error de autenticación. Rol no válido.');</script>";
        }

        exit();
    } else {
        // Tokens no coinciden, muestra un mensaje de error
        echo "<script>alert('Error de autenticación. Tokens no coinciden.');</script>";
    }
} else {
    // No se encontró un usuario con el nombre proporcionado
    echo "<script>alert('Error de autenticación. No se encontró el usuario.');</script>";
}

// Cerrar la conexión
$stmt_select_token->close();
$conn->close();
?>
