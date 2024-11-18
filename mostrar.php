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

// Consulta para obtener todos los registros de la tabla 'usuarios'
$sql = "SELECT * FROM usuarios"; // O cambia la tabla y columnas según tus necesidades
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla HTML
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Listado de Usuarios</title>
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
        <h1>Bienvenido al Sistema de Usuarios</h1>
        <h2>Listado de Usuarios Registrados</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
            </tr>";

    // Mostrar cada fila de los resultados
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['correo'] . "</td>
            </tr>";
    }

    echo "</table>";

} else {
    echo "<p>No hay resultados.</p>";
}

// Cerrar la conexión
$conn->close();

echo "
    <p><a href='index.php'>Regresar a la página principal</a></p>
    </body>
    </html>";
?>
