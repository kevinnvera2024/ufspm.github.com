<?php
// Conexión a la base de datos
try {
    $db = new PDO('sqlite:cadetes.db'); // Asegúrate de que la ruta sea correcta
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Capturar los datos del formulario
        $legajo = $_POST['legajo'];
        $nombre = $_POST['nombre'];
        $anio = $_POST['anio'];
        $dni = $_POST['dni'];
        $correo = $_POST['correo']; // Nuevo campo
        $domicilio = $_POST['domicilio']; // Nuevo campo
        $telefono = $_POST['telefono']; // Nuevo campo

        // Verificar si el legajo ya existe
        $stmt = $db->prepare("SELECT COUNT(*) FROM cadetes WHERE legajo = :legajo");
        $stmt->bindParam(':legajo', $legajo);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "El legajo ya existe. Por favor, utiliza un número de legajo diferente.";
        } else {
            // Manejo de la foto
            $foto = $_FILES['foto'];
            $rutaFoto = 'fotos/' . basename($foto['name']);

            // Verificar si la carpeta "fotos" existe, si no, crearla
            if (!file_exists('fotos')) {
                mkdir('fotos', 0777, true);
            }

            // Mover la foto a la carpeta
            if (move_uploaded_file($foto['tmp_name'], $rutaFoto)) {
                // Preparar la consulta SQL para insertar el nuevo cadete
                $stmt = $db->prepare("INSERT INTO cadetes (legajo, nombre, anio, dni, correo, domicilio, telefono, foto) VALUES (:legajo, :nombre, :anio, :dni, :correo, :domicilio, :telefono, :foto)");
                $stmt->bindParam(':legajo', $legajo);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':anio', $anio);
                $stmt->bindParam(':dni', $dni);
                $stmt->bindParam(':correo', $correo); // Bind del nuevo campo
                $stmt->bindParam(':domicilio', $domicilio); // Bind del nuevo campo
                $stmt->bindParam(':telefono', $telefono); // Bind del nuevo campo
                $stmt->bindParam(':foto', $rutaFoto);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    // Redirigir de vuelta a la lista de cadetes
                    header("Location: lista_cadetes.php");
                    exit;
                } else {
                    echo "Error al agregar el cadete.";
                }
            } else {
                echo "Error al subir la foto.";
            }
        }
    }
} catch (PDOException $e) {
    die('Error al conectar con la base de datos: ' . $e->getMessage());
}
?>