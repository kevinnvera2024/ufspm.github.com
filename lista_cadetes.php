<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cadetes</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .controls {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-left: 10px;
            font-size: 18px;
        }
        button:hover {
            background-color: #0056b3;
        }
        
        /* Estilos para el modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5); /* Más opacidad */
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 5px 15px rgba(0,0,0,0.3); /* Sombra */
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal h2 {
            margin-top: 0;
            margin-bottom: 15px;
        }
        .modal label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        .modal input[type="text"],
        .modal input[type="number"],
        .modal input[type="email"],
        .modal input[type="file"],
        .modal input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .modal input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .modal input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Estilo para las imágenes en la tabla */
        img {
            width: 60px; 
            height: 60px; 
            border-radius: 50%; 
            object-fit: cover; /* Mantiene la proporción de la imagen */
        }
    </style>
</head>
<body>
    <h1>Lista de Cadetes
        <div class="controls">
            <button onclick="mostrarModal()">Agregar Cadete</button>
        </div>
    </h1>
    
    <div>
        <button onclick="filtrarCadetes(1)">1.º Año</button>
        <button onclick="filtrarCadetes(2)">2.º Año</button>
        <button onclick="filtrarCadetes(3)">3.º Año</button>
        <button onclick="filtrarCadetes(4)">4.º Año</button>
        <button onclick="filtrarCadetes()">Todos</button>
    </div>

    <table id="cadetes-table">
      <thead>
         <tr>
            <th>Foto</th>
            <th>Número de Legajo</th>
            <th>Nombre Completo</th>
            <th>Año</th>
            <th>DNI</th>
            <th>Opciones</th>
         </tr>
        </thead>
        <tbody id="cadetes-list">
    <?php
    // Conexión a la base de datos
    try {
        $db = new PDO('sqlite:cadetes.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recuperar todos los cadetes de la base de datos
        $stmt = $db->query("SELECT * FROM cadetes");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr data-anio='{$row['anio']}'>
                    <td><img src='{$row['foto']}' alt='Foto'></td>
                    <td>{$row['legajo']}</td>
                    <td>{$row['nombre']}</td>
                    <td>{$row['anio']}</td>
                    <td>{$row['dni']}</td>
                    <td>
                        <button onclick='window.location.href=\"ver_cadete.php?legajo={$row['legajo']}\"'>Ver más</button>
                        <form action='eliminar_cadete.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='legajo' value='{$row['legajo']}'>
                            <button type='submit' style='background-color:red;color:white;border:none;padding:5px 10px;border-radius:5px;'>-</button>
                        </form>
                    </td>
                </tr>";
        }
    } catch (Exception $e) {
        die('Error al conectar con la base de datos: ' . $e->getMessage());
    }
    ?>
    </tbody>
    </table>

   <!-- Modal para agregar un nuevo cadete -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <h2>Agregar Nuevo Cadete</h2>
        <form id="cadete-form" action="agregar_cadete.php" method="POST" enctype="multipart/form-data">
            <label for="legajo">Número de Legajo:</label>
            <input type="text" id="legajo" name="legajo" required>

            <label for="nombre">Nombre Completo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="domicilio">Domicilio:</label>
            <input type="text" id="domicilio" name="domicilio" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>

            <label for="anio">Año:</label>
            <input type="text" id="anio" name="anio" required>

            <label for="foto">Subir Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>

            <input type="submit" value="Agregar Cadete">
        </form>
    </div>
</div>

    <script>
        // Función para mostrar el modal
        function mostrarModal() {
            document.getElementById("myModal").style.display = "block";
        }

        // Función para cerrar el modal
        function cerrarModal() {
            document.getElementById("myModal").style.display = "none";
        }

        // Cerrar el modal si se hace clic fuera de él
        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                cerrarModal();
            }
        }

        // Función para filtrar cadetes por año
        function filtrarCadetes(anio) {
            const filas = document.querySelectorAll("#cadetes-list tr");
            filas.forEach(fila => {
                if (anio) {
                    if (fila.getAttribute('data-anio') == anio) {
                        fila.style.display = ""; // Mostrar fila
                    } else {
                        fila.style.display = "none"; // Ocultar fila
                    }
                } else {
                    fila.style.display = ""; // Mostrar todas las filas
                }
            });
        }
    </script>
</body>
</html>