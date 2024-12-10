<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Cadete</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            display: flex;
            margin-bottom: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .foto {
            flex: 1;
            margin-right: 20px;
        }
        .foto img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .datos {
            flex: 2;
        }
        .tabs {
            margin-top: 20px;
        }
        .tab {
            display: inline-block;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            margin-right: 5px;
            cursor: pointer;
            border-radius: 5px;
        }
        .tab-content {
            display: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            background: white;
            margin-top: 10px;
        }
        .active {
            background: #0056b3;
        }
        .active-content {
            display: block;
        }
        /* Estilos de la sección de sanciones */
        .sanciones-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .sancion-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            align-items: center;
        }
        .sancion-row:last-child {
            border-bottom: none;
        }
        .sancion-input, .fecha-input {
            flex: 1;
            margin-right: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Estilo para la tabla de sumarios */
.sumarios-table {
    width: 100%; /* Ajusta el ancho de la tabla */
    border-collapse: collapse; /* Elimina los bordes duplicados */
    margin-top: 20px; /* Espacio superior */
}

.sumarios-table th, .sumarios-table td {
    border: 1px solid #ccc; /* Bordes de las celdas */
    padding: 10px; /* Espaciado dentro de las celdas */
    text-align: left; /* Alineación de texto a la izquierda */
}

.sumarios-table th {
    background-color: #f2f2f2; /* Color de fondo para los encabezados */
}

/* Estilo para el contenedor de sumarios */
.sumarios-container {
    margin-top: 20px; /* Espacio superior */
    padding: 20px; /* Espaciado interno */
    border: 1px solid #ccc; /* Bordes del contenedor */
    border-radius: 5px; /* Bordes redondeados */
    background-color: #fafafa; /* Color de fondo del contenedor */
}

/* Botón de eliminar */
.btn-danger {
    background-color: #e74c3c; /* Color de fondo del botón */
    color: #fff; /* Color del texto */
    border: none; /* Sin borde */
    padding: 5px 10px; /* Espaciado interno */
    border-radius: 3px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar el cursor al pasar por encima */
}

.btn-danger:hover {
    background-color: #c0392b; /* Color de fondo al pasar el cursor */
}

        .materias-container {
        margin: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .materia-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .materia-row:last-child {
        border-bottom: none; /* Quita el borde en la última fila */
    }

    .materia-nombre {
        flex: 1;
        font-weight: bold;
    }

    .materia-promedio {
        flex: 1;
        text-align: center;
        color: #555;
    }

    .boton-container {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .inline-form {
        display: flex;
        align-items: center;
    }

    .inline-form input[type="number"] {
        width: 70px;
        margin-right: 5px;
    }

    .inline-form button {
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .inline-form button:hover {
        background-color: #0056b3; /* Color más oscuro al pasar el ratón */
    }





    .btn {
    display: inline-block; /* Para que el botón respete el tamaño del texto */
    padding: 10px 15px; /* Espaciado interno igual para todos los botones */
    border-radius: 4px; /* Bordes redondeados */
    text-decoration: none; /* Sin subrayado para enlaces */
    margin-right: 5px; /* Espacio a la derecha de los botones */
    font-size: 14px; /* Tamaño de fuente */
}

.btn-success {
    background-color: #28a745; /* Color de fondo */
    color: #fff; /* Color del texto */
    border: none; /* Sin borde */
}

.btn-success:hover {
    background-color: #218838; /* Color de fondo al pasar el cursor */
}

.btn-danger {
    background-color: #dc3545; /* Color de fondo */
    color: #fff; /* Color del texto */
    border: none; /* Sin borde */
}

.btn-danger:hover {
    background-color: #c82333; /* Color de fondo al pasar el cursor */
}

.novedades-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.novedades-table th, .novedades-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.novedades-table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.btn {
    padding: 8px 12px;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

.btn-danger {
    background-color: #ff4d4d;
    color: white;
}

.btn-danger:hover {
    background-color: #ff1a1a;
}

/* Estilos del botón de modificar */
.btn-modificar {
    display: inline-block;
    padding: 10px 15px;
    margin-top: 15px;
    font-size: 16px;
    color: #fff;
    background-color: #4CAF50;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
}

.btn-modificar:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
<h1>Detalles del Cadete</h1>

<div class="container">
    <div class="foto">
        <?php
        // Conexión y obtención de datos del cadete
        $legajo = $_GET['legajo'];
        try {
            $db = new PDO('sqlite:cadetes.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("SELECT * FROM cadetes WHERE legajo = :legajo");
            $stmt->bindParam(':legajo', $legajo);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                echo "<img src='{$row['foto']}' alt='Foto del cadete'>";
            } else {
                echo "<p>No se encontró el cadete.</p>";
            }
        } catch (Exception $e) {
            die('Error al conectar con la base de datos: ' . $e->getMessage());
        }
        ?>
    </div>
    <div class="datos">
        <h2><?php echo htmlspecialchars($row['nombre']); ?></h2>
        <p><strong>Número de Legajo:</strong> <?php echo htmlspecialchars($row['legajo']); ?></p>
        <p><strong>Año:</strong> <?php echo htmlspecialchars($row['anio']); ?></p>
        <p><strong>DNI:</strong> <?php echo htmlspecialchars($row['dni']); ?></p>
        <p><strong>Correo:</strong> <?php echo htmlspecialchars($row['correo']); ?></p>
        <p><strong>Domicilio:</strong> <?php echo htmlspecialchars($row['domicilio']); ?></p>
        <p><strong>Número de Teléfono:</strong> <?php echo htmlspecialchars($row['telefono']); ?></p>
        <p><strong>Tatuajes visibles:</strong> <?php echo htmlspecialchars($row['tatuajes_visibles']); ?></p>
        <p><strong>Ubicación del tatuaje:</strong> <?php echo htmlspecialchars($row['ubicacion_tatuaje']); ?></p>

        <!-- Botón para modificar datos -->
        <a href="modificar_datoscadete.php?legajo=<?php echo urlencode($row['legajo']); ?>" class="btn-modificar">Modificar Datos</a>
     </div>
</div>

    <div class="tabs">
        <div class="tab active" onclick="showTab('sanciones')">Sanciones</div>
        <div class="tab" onclick="showTab('sumarios')">Sumarios</div>
        <div class="tab" onclick="showTab('novedades_medicas')">Novedades Médicas</div>
        <div class="tab" onclick="showTab('servicios')">Servicios</div>
        <div class="tab" onclick="showTab('promedio_academico')">Promedio Academico</div>
        <div class="tab" onclick="showTab('materias')">Promedio IFFP</div>
        <div class="tab" onclick="showTab('distinciones')">Distinciones</div>
    </div>

    <div id="sanciones" class="tab-content active-content">
        <h3>Agregar Sanción</h3>
        <form action="agregar_sancion.php?legajo=<?php echo htmlspecialchars($legajo); ?>" method="post" class="sanciones-container">
            <label for="sancion_texto">Sanción:</label>
            <input type="text" name="sancion_texto" id="sancion_texto" class="sancion-input" required>
            
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="fecha-input" required>
            
            <button type="submit" class="btn">Agregar Sanción</button>
        </form>

        <h3>Sanciones</h3>
        <div class="sanciones-container">
            <?php
            try {
                $db = new PDO('sqlite:cadetes.db');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $db->prepare("SELECT * FROM sanciones WHERE legajo = :legajo ORDER BY fecha DESC");
                $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
                $stmt->execute();
                $sanciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($sanciones) {
                    foreach ($sanciones as $sancion) {
                        echo '<div class="sancion-row">';
                        echo '<div>' . htmlspecialchars($sancion['sancion_texto']) . '</div>';
                        echo '<div>' . htmlspecialchars($sancion['fecha']) . '</div>';
                        echo '<form action="eliminar_sancion.php" method="post" style="display:inline;">';
                        echo '<input type="hidden" name="id" value="' . $sancion['id'] . '">';
                        echo '<input type="hidden" name="legajo" value="' . $legajo . '">';
                        echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay sanciones registradas para este cadete.</p>';
                }
            } catch (PDOException $e) {
                echo "Error al obtener las sanciones: " . $e->getMessage();
            }
            ?>
        </div>
    </div>

    <div id="sumarios" class="tab-content">
    <h3>Subir Sumario</h3>
    <form action="subir_sumario.php?legajo=<?php echo htmlspecialchars($legajo); ?>" method="post" enctype="multipart/form-data">
        <label for="sumario">Archivo de Sumario:</label>
        <input type="file" name="sumario" id="sumario" required>
        
        <button type="submit">Subir Sumario</button>
    </form>

    <h3>Sumarios Subidos</h3>
    <div class="sumarios-container">
        <?php
        try {
            $db = new PDO('sqlite:cadetes.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta para obtener todos los sumarios del cadete según el número de legajo
            $stmt = $db->prepare("SELECT * FROM sumarios WHERE legajo = :legajo ORDER BY fecha DESC");
            $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
            $stmt->execute();
            $sumarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($sumarios) {
                echo '<table class="sumarios-table">';
                echo '<tr><th>Nombre del Archivo</th><th>Acciones</th></tr>';
                foreach ($sumarios as $sumario) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($sumario['nombre_archivo']) . '</td>';
                    echo '<td>';
                    // Botón para descargar el sumario
                    echo '<a href="uploads/' . htmlspecialchars($sumario['nombre_archivo']) . '" class="btn btn-success" download>Descargar</a>';
                    // Formulario para eliminar el sumario
                    echo '<form action="eliminar_sumario.php" method="post" style="display:inline;">';
                    echo '<input type="hidden" name="id" value="' . $sumario['id'] . '">';
                    echo '<input type="hidden" name="legajo" value="' . $legajo . '">'; // Incluye el legajo
                    echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No hay sumarios registrados para este cadete.</p>';
            }
        } catch (PDOException $e) {
            echo "Error al obtener los sumarios: " . $e->getMessage();
        }
        ?>
    </div>
</div>

<div id="novedades_medicas" class="tab-content">
    <h3>Subir Novedad Médica</h3>
    <form action="subir_novedad_medica.php?legajo=<?php echo htmlspecialchars($legajo); ?>" method="post" enctype="multipart/form-data">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" required>
        
        <label for="archivo">Archivo (Imagen, PDF o Excel):</label>
        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png, .pdf, .xls, .xlsx" required>

        <button type="submit">Subir Novedad Médica</button>
    </form>

    <h3>Novedades Médicas Subidas</h3>
    <div class="novedades-medicas-container">
        <?php
        try {
            $db = new PDO('sqlite:cadetes.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Consulta para obtener todas las novedades médicas del cadete según el número de legajo
            $stmt = $db->prepare("SELECT * FROM novedades_medicas WHERE legajo = :legajo ORDER BY fecha DESC");
            $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
            $stmt->execute();
            $novedades = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($novedades) {
                echo '<table class="novedades-table">';
                echo '<tr><th>Descripción</th><th>Archivo</th><th>Acciones</th></tr>';
                foreach ($novedades as $novedad) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($novedad['descripcion']) . '</td>';
                    echo '<td><a href="uploads/' . htmlspecialchars($novedad['nombre_archivo']) . '" download>' . htmlspecialchars($novedad['nombre_archivo']) . '</a></td>';
                    echo '<td>';
                    echo '<form action="eliminar_novedad_medica.php" method="post" style="display:inline;">';
                    echo '<input type="hidden" name="id" value="' . $novedad['id'] . '">';
                    echo '<input type="hidden" name="legajo" value="' . $legajo . '">'; 
                    echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No hay novedades médicas registradas para este cadete.</p>';
            }
        } catch (PDOException $e) {
            echo "Error al obtener las novedades médicas: " . $e->getMessage();
        }
        ?>
    </div>
</div>

<div id="promedio_academico" class="tab-content">
    <h3>Promedio Académico General</h3>
    <div class="materias-container">
        <div class="materia-row">
            <div class="materia-nombre">Promedio General</div>
            <div class="materia-promedio">
                <?php
                try {
                    $db = new PDO('sqlite:cadetes.db');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Consulta para obtener el promedio académico general del cadete
                    $stmt = $db->prepare("SELECT promedio FROM promedios_academicos WHERE legajo = :legajo ORDER BY fecha DESC LIMIT 1");
                    $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
                    $stmt->execute();
                    $promedio = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($promedio) {
                        echo htmlspecialchars($promedio['promedio']);
                    } else {
                        echo "No hay promedio registrado";
                    }
                } catch (PDOException $e) {
                    echo "Error al obtener el promedio: " . $e->getMessage();
                }
                ?>
            </div>
            <div class="boton-container">
                <!-- Formulario para agregar promedio -->
                <form action="agregar_promedioacademico.php?legajo=<?php echo htmlspecialchars($legajo); ?>" method="POST" class="inline-form">
                    <input type="number" name="promedio" placeholder="Promedio" required step="0.01" min="0" max="10">
                    <button type="submit">Guardar</button>
                </form>
                <!-- Formulario para eliminar promedio -->
                <form action="eliminar_promedioacademico.php" method="POST" class="inline-form">
                <input type="hidden" name="legajo" value="<?php echo htmlspecialchars($legajo); ?>">
                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este promedio?');">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    

    <div id="materias" class="tab-content">
        <?php
        // Conexión a la base de datos
        try {
            $db = new PDO('sqlite:cadetes.db'); // Conectar a la base de datos
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Obtener el número de legajo desde la URL
            if (isset($_GET['legajo'])) {
                $legajo = intval($_GET['legajo']); // Asegúrate de que sea un número entero
                
                // Consulta para obtener todas las materias
                $materiasQuery = "SELECT id, nombre FROM materias";
                $materiasStmt = $db->prepare($materiasQuery);
                $materiasStmt->execute();
                
                // Obtener todas las materias
                $materias = $materiasStmt->fetchAll(PDO::FETCH_ASSOC);
                
                // Consulta para obtener calificaciones del legajo específico
                $calificacionesQuery = "
                    SELECT materia_id, promedio 
                    FROM calificaciones 
                    WHERE legajo = :legajo
                ";
                $calificacionesStmt = $db->prepare($calificacionesQuery);
                $calificacionesStmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
                $calificacionesStmt->execute();
                
                // Obtener calificaciones y almacenarlas en un array
                $calificaciones = $calificacionesStmt->fetchAll(PDO::FETCH_ASSOC);
                $calificacionesArray = [];
                foreach ($calificaciones as $calificacion) {
                    $calificacionesArray[$calificacion['materia_id']] = $calificacion['promedio'];
                }
            } else {
                echo "Número de legajo no proporcionado.";
                exit;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        <h3>CALIFICACIONES POR LEGAJO: <?php echo htmlspecialchars($legajo); ?></h3>
        <div class="materias-container">
            <?php if (!empty($materias)): ?>
                <?php foreach ($materias as $materia): ?>
                    <div class="materia-row">
                        <div class="materia-nombre"><?php echo htmlspecialchars($materia['nombre']); ?></div>
                        <div class="materia-promedio">
                            <?php
                            // Verificar si hay calificación para esta materia
                            if (isset($calificacionesArray[$materia['id']])) {
                                echo htmlspecialchars($calificacionesArray[$materia['id']]);
                            } else {
                                echo "No hay calificaciones";
                            }
                            ?>
                        </div>
                        <div class="boton-container">
                            <!-- Formulario para agregar calificación -->
                            <form action="agregar_calificacion.php" method="POST" class="inline-form">
                                <input type="hidden" name="legajo" value="<?php echo htmlspecialchars($legajo); ?>">
                                <input type="hidden" name="materia_id" value="<?php echo htmlspecialchars($materia['id']); ?>">
                                <input type="number" name="calificacion" placeholder="Calificación" required>
                                <button type="submit">Agregar</button>
                            </form>
                            <!-- Formulario para eliminar calificación -->
                            <form action="eliminar_calificacion.php" method="POST" class="inline-form">
                                <input type="hidden" name="legajo" value="<?php echo htmlspecialchars($legajo); ?>">
                                <input type="hidden" name="materia_id" value="<?php echo htmlspecialchars($materia['id']); ?>">
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta calificación?');">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div>No se encontraron materias.</div>
            <?php endif; ?>
        </div>

        
        <?php
        // Cerrar la conexión
        $db = null;
        ?>
    </div>

    
    

    <div id="distinciones" class="tab-content active-content">
        <h3>Agregar distincion</h3>
        <form action="agregar_distincion.php?legajo=<?php echo htmlspecialchars($legajo); ?>" method="post" class="distinciones-container">
            <label for="distincion_texto">Distincion:</label>
            <input type="text" name="distincion_texto" id="distincion_texto" class="distincion-input" required>
            
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="fecha-input" required>
            
            <button type="submit" class="btn">Agregar distincion</button>
        </form>

        <h3>Distinciones</h3>
        <div class="distinciones-container">
            <?php
            try {
                $db = new PDO('sqlite:cadetes.db');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $db->prepare("SELECT * FROM distinciones WHERE legajo = :legajo ORDER BY fecha DESC");
                $stmt->bindParam(':legajo', $legajo, PDO::PARAM_INT);
                $stmt->execute();
                $distinciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($distinciones) {
                    foreach ($distinciones as $distincion) {
                        echo '<div class="distincion-row">';
                        echo '<div>' . htmlspecialchars($distincion['distincion_texto']) . '</div>';
                        echo '<div>' . htmlspecialchars($distincion['fecha']) . '</div>';
                        echo '<form action="eliminar_distincion.php" method="post" style="display:inline;">';
                        echo '<input type="hidden" name="id" value="' . $distincion['id'] . '">';
                        echo '<input type="hidden" name="legajo" value="' . $legajo . '">';
                        echo '<button type="submit" class="btn btn-danger">Eliminar</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hay distincinones registradas para este cadete.</p>';
                }
            } catch (PDOException $e) {
                echo "Error al obtener las distinciones: " . $e->getMessage();
            }
            ?>
        </div>
    </div>



    

    <script>
        function showTab(tabName) {
            var tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(function(tab) {
                tab.classList.remove('active-content');
            });
            
            var tabButtons = document.querySelectorAll('.tab');
            tabButtons.forEach(function(btn) {
                btn.classList.remove('active');
            });

            document.getElementById(tabName).classList.add('active-content');
            event.target.classList.add('active');
        }
    </script>
</body>
</html>