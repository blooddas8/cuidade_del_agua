<?php
// Conexión a la base de datos (ajusta los parámetros según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuidado_del_agua";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a la página principal después de un registro exitoso
    header("Location: index.html");
    exit(); // Asegúrate de detener la ejecución del código después de la redirección
} else {
    // Si hay un error, mostrarlo
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

