<?php
// Iniciar sesión
session_start();

// Obtener el usuario actual
$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';

// Limpiar todas las variables de sesión
$_SESSION = array();

// Invalidar la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Eliminar el token de la base de datos asociado al usuario
if (!empty($usuario)) {
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

    // Actualizar la base de datos para eliminar el token
    $stmt_update_token = $conn->prepare("UPDATE usuarios SET token = NULL WHERE usuario = ?");
    $stmt_update_token->bind_param("s", $usuario);
    $stmt_update_token->execute();
    $stmt_update_token->close();

    // Cerrar la conexión
    $conn->close();
}

// Redirigir al usuario a la página de inicio de sesión
header("Location: index.html");
exit();
?>
