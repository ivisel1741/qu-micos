<?php
// Incluir el archivo de conexión
require_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compatibilidad de Sustancias Químicas</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluir jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Incluir el archivo CSS externo -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>Compatibilidad de Sustancias Químicas</h1>
            <p class="lead">Verifica la compatibilidad entre diferentes sustancias químicas</p>
        </div>
        <div class="card">
            <div class="card-body">
                <form id="compatibilityForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="sustancia1">Sustancia 1</label>
                            <select id="sustancia1" class="form-control">
                                <?php
                                $sql = "SELECT DISTINCT Nombre_sustancia FROM t_detalle_grupos";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["Nombre_sustancia"] . "'>" . $row["Nombre_sustancia"] . "</option>";
                                    }
                                } else {
                                    echo "<option>No se encontraron sustancias</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sustancia2">Sustancia 2</label>
                            <select id="sustancia2" class="form-control">
                                <?php
                                $result->data_seek(0);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["Nombre_sustancia"] . "'>" . $row["Nombre_sustancia"] . "</option>";
                                    }
                                } else {
                                    echo "<option>No se encontraron sustancias</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="button" class="btn btn-custom" onclick="verificarCompatibilidad()">Verificar Compatibilidad</button>
                </form>
                <div id="loading" class="text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Cargando...</span>
                    </div>
                    <p>Cargando...</p>
                </div>
            </div>
        </div>

        <!-- La ventana modal -->
        <div id="dialog" title="Resultado de Compatibilidad" style="display:none;">
            <div id="resultadoModal">
                <!-- Aquí se mostrará el resultado -->
            </div>
        </div>
    </div>

    <!-- Incluir jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Incluir jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Incluir el archivo JavaScript externo -->
    <script src="js/scripts.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
