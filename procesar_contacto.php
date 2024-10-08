<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario por defecto de XAMPP
$password = ""; // Contraseña vacía por defecto
$dbname = "contactos"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['name'];
$email = $_POST['email'];
$genero = $_POST['genero'];
$mensaje = $_POST['message'];
$calificacion = $_POST['rating'];

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO mensajes (nombre, email, genero, mensaje, calificacion) VALUES (?, ?, ?, ?, ?)";

// Preparar la declaración
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nombre, $email, $genero, $mensaje, $calificacion);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Enviado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("wp3925565.jpg");  /* Ruta de la imagen de fondo */
            background-size: cover; /* Hace que la imagen cubra toda la pantalla */
            background-position: center; /* Centra la imagen */
            background-attachment: fixed; /* Fija la imagen cuando se hace scroll */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            color: white; /* Cambia el color del texto para que contraste con la imagen */
        }
        h1 {
            padding: 15px 30px;
            background-color: #03035ba5;
            color: #f1f2f7; /* Verde */
            margin-bottom: 20px;
        }
        p {
            padding: 15px 30px;
            background-color: #03035ba5;
            font-size: 18px;
            margin-bottom: 30px;
            color: #ffffff; /* Texto en blanco para contrastar con el fondo */
        }
        a {
            background-color: #03035ba5;
            text-decoration: none;
            color: #fafbfc; /* Azul */
            font-weight: bold;
            padding: 10px 15px;
            border: 2px solid #12129a83;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Gracias por contactarnos</h1>
    <p>Tu mensaje ha sido enviado exitosamente.</p>
    <a href="Medellin.inicio.html">Volver a la página de inicio</a>
</body>
</html>
