<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0; /* Aseguramos que no haya márgenes */
        }
        header {
            background-color: #141E37; /* Color del encabezado */
            color: white;
            text-align: center;
            padding: 10px; /* Reducción de padding para hacer el encabezado más corto */
            width: 100%;
            position: absolute; /* Permite que el encabezado esté fijo en la parte superior */
            top: 0; /* Alinea el encabezado en la parte superior */
        }
        header img {
            width: 200px; /* Tamaño de la imagen cuadrada */
            height: 200px; /* Tamaño de la imagen cuadrada */
            border-radius: 10%; /* Bordes redondeados */
            margin-bottom: 5px; /* Espacio entre la imagen y el título */
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 220px; /* Espacio para el encabezado */
        }
        h2 {
            margin-bottom: 20px;
            text-align: center; /* Centra el título */
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%; /* Botón ocupa todo el ancho */
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        img{
            width: 100;
        }
    </style>
</head>
<body>
    <header>
        <img src="313433657_136475269171371_3961659974749889912_n.jpg" alt="Logo">
    </header>
		<meta charset="utf-8">
		<META HTTP-EQUIV="REFRESH" CONTENT="2;URL=menu_opciones.html">




<?php
// Conexión a la base de datos SQLite3
try {
    $db = new PDO('sqlite:usuarios.db');  // Cambia la ruta si tu archivo está en otra ubicación
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para obtener el usuario
    $stmt = $db->prepare('SELECT * FROM usuarios WHERE username = :username');
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    
    // Obtener el usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verificar si la contraseña es correcta
        if ($password == $usuario['password']) {  // Solo para pruebas, sin hash
            echo ' <html> <img  class="img" src="loading.gif"> </html> ';
            // Aquí puedes redirigir a otra página o iniciar una sesión
            // header('Location: pagina_principal.php');
            exit;
        } else {
            echo 'Contraseña incorrecta.';
        }
    } else {
        echo 'Usuario no encontrado.';
    }
}
?>