<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // o la dirección IP del servidor de base de datos
$username = "root"; // tu nombre de usuario de MySQL
$password = ""; // tu contraseña de MySQL
$dbname = "químicos"; // el nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener las sustancias
function obtenerSustancias($conn) {
    $sql = "SELECT Nombre_sustancia FROM t_detalle_grupos";
    $result = $conn->query($sql);
    
    $sustancias = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sustancias[] = $row['Nombre_sustancia'];
        }
    }
    
    return $sustancias;
}

// Función para obtener el grupo al que pertenece una sustancia
function obtenerGrupoPorSustancia($conn, $nombre_sustancia) {
    $sql = "SELECT g.N_grupo, g.Nombre_grupo 
            FROM t_detalle_grupos d
            JOIN t_grupos g ON d.N_grupo = g.N_grupo
            WHERE d.Nombre_sustancia = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre_sustancia);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
?>
