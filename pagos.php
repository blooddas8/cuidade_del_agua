<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuidado_del_agua"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los registros de la tabla 'pagos'
$sql = "SELECT * FROM pagos";  // Cambia esta consulta si lo necesitas
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Listado de Pagos</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                text-align: center;
            }
            table {
                margin: 0 auto;
                border-collapse: collapse;
                width: 80%;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
            tr:nth-child(even) {
                background-color: #f9f9f9;
            }
            h1, h2 {
                color: #333;
            }
            p {
                font-size: 18px;
                color: #555;
            }
        </style>
    </head>
    <body>
        <h1>Bienvenido al Sistema de Pagos</h1>
        <h2>Listado de Pagos Registrados</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre del Titular</th>
                <th>Tarjeta</th>
                <th>Fecha de Caducidad</th>
                <th>CVV</th>
            </tr>";

    // Mostrar cada fila de los resultados
    while($row = $result->fetch_assoc()) {
        // Extraer los últimos 4 dígitos de la tarjeta
        $numero_tarjeta_mostrado = "*******" . substr($row['numero_tarjeta'], -4);

        // Ocultar el CVV
        $cvv_mostrado = "****";

        // Mostrar los datos en la tabla
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nombre_titular'] . "</td>
                <td>" . $numero_tarjeta_mostrado . "</td>
                <td>" . $row['fecha_caducidad'] . "</td>
                <td>" . $cvv_mostrado . "</td>
            </tr>";
    }

    echo "</table>";

} else {
    echo "<p>No hay pagos registrados.</p>";
}

// Cerrar la conexión
$conn->close();

echo "
    <p><a href='index.php'>Regresar a la página principal</a></p>
    </body>
    </html>";
?>
