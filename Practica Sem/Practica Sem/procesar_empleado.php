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
$rol = $_POST['rol'];

// Validar el correo con expresiones regulares
$regexCorreo = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
if (!preg_match($regexCorreo, $usuario)) {
    echo "<script>alert('Por favor, ingrese un correo electrónico válido.'); window.location.href='AgregarUsuario.php'</script>";
    exit();
}

// Validar la contraseña
if (strlen($contraseña) < 8) {
    echo "<script>alert('La contraseña debe tener al menos 8 caracteres.'); window.location.href='AgregarUsuario.php'</script>";
    exit();
}

// Validar contraseña con mayúsculas, minúsculas, números y caracteres especiales
if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $contraseña)) {
    echo "<script>alert('La contraseña debe contener al menos una mayúscula, una minúscula, un número y un carácter especial.'); window.location.href='AgregarUsuario.php'</script>";
    exit();
}

// Encriptar la contraseña con password_hash y Bcrypt
$contraseña_encriptada = password_hash($contraseña, PASSWORD_BCRYPT);

// Insertar datos en la base de datos con la contraseña encriptada
$sql = "INSERT INTO usuarios (usuario, contraseña, rol) VALUES ('$usuario', '$contraseña_encriptada', '$rol')";

if ($conn->query($sql) === TRUE) {
    // Registro exitoso, puedes redirigir o mostrar un mensaje de éxito
    echo "<script>alert('Usuario agregado correctamente'); window.location.href='AgregarUsuario.php'</script>";
} else {
    // Error en la inserción, puedes mostrar un mensaje de error o redirigir a una página de error
    echo "<script>alert('Error al agregar usuario');window.location.href='AgregarUsuario.php'</script>";
}

// Cerrar la conexión
$conn->close();
?>
