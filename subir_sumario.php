<?php
// subir_sumario.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $legajo = $_GET['legajo'];
    $targetDir = "uploads/"; // Carpeta donde se guardarán los sumarios

    // Crear el directorio si no existe
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0755, true); // Crea el directorio con permisos
    }
    
    $fileName = basename($_FILES["sumario"]["name"]); // Almacena el nombre del archivo en una variable
    $targetFile = $targetDir . $fileName;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar si el archivo es un PDF (ajusta esto según tus necesidades)
    if ($fileType != "pdf") {
        echo "Lo siento, solo se permiten archivos PDF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk es 0 por algún error
    if ($uploadOk == 0) {
        echo "Lo siento, el archivo no se subió.";
    } else {
        // Intentar subir el archivo
        if (move_uploaded_file($_FILES["sumario"]["tmp_name"], $targetFile)) {
            // Conectar a la base de datos y guardar la información del archivo
            try {
                $db = new PDO('sqlite:cadetes.db');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $stmt = $db->prepare("INSERT INTO sumarios (legajo, nombre_archivo) VALUES (:legajo, :nombre_archivo)");
                $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
                $stmt->bindParam(':nombre_archivo', $fileName, PDO::PARAM_STR); // Usar la variable aquí
                $stmt->execute();

                // Redireccionar a ver_cadete.php
                header("Location: ver_cadete.php?legajo=" . $legajo);
                exit(); // Asegúrate de terminar el script después de la redirección
            } catch (PDOException $e) {
                echo "Error al guardar en la base de datos: " . $e->getMessage();
            }
        } else {
            echo "Lo siento, hubo un error al subir su archivo.";
        }
    }
} else {
    echo "Método no permitido.";
}
?>