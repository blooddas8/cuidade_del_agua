<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuidado_del_agua";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre_titular = $_POST['nombre_titular'];
$numero_tarjeta = $_POST['numero_tarjeta'];  // No se recomienda guardar números de tarjeta directamente
$fecha_caducidad = $_POST['fecha_caducidad'];
$cvv = $_POST['cvv'];  // No se recomienda guardar el CVV

// Insertar los datos en la base de datos
$sql = "INSERT INTO pagos (nombre_titular, numero_tarjeta, fecha_caducidad, cvv) 
        VALUES ('$nombre_titular', '$numero_tarjeta', '$fecha_caducidad', '$cvv')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a la página principal después de un pago exitoso
    header("Location: index.html");
    exit(); // Detener la ejecución del código después de la redirección
} else {
    // Si hay un error, mostrarlo
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
