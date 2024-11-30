<?php
// Incluir el archivo de conexión
require_once "conexion.php";

// Obtener las sustancias seleccionadas
$sustancia1 = $_GET["sustancia1"];
$sustancia2 = $_GET["sustancia2"];

// Consulta para obtener el grupo de la sustancia 1
$sql = "SELECT id_reg_grupo FROM t_detalle_grupos WHERE Nombre_sustancia = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $sustancia1);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id_reg_grupo_sustancia1 = $row["id_reg_grupo"];

// Consulta para obtener el grupo de la sustancia 2
$stmt->bind_param("s", $sustancia2);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id_reg_grupo_sustancia2 = $row["id_reg_grupo"];

$msj1 ="No hay incompatibilidad";
$H ="Genera calor por reacción química.";
$P ="Produce polimerización violenta, generando calor extremo y gases tóxicos e inflamables.";
$G ="Genera gases en grandes cantidades y puede producir presión y ruptura de los recipientes cerrados.";
$F ="Produce fuego por reacciones exotérmicas violentas y por ignición de mezclas o de productos de la reacción.";
$gt ="Genera gases tóxicos.";
$gf ="Genera gases inflamables.";
$E ="Produce explosión debido a reacciones extremadamente vigorosas o suficientemente exotérmicas para detonar compuestos inestables o productos de reacción.";
$S ="Solubilización de metales y compuestos metales tóxicos.";
$D="Produce reacción desconocida. Sin embargo, debe considerarse como incompatible la mezcla de los residuos correspondientes a este código hasta que se determine la reacción específica.";
$REACTIVO = "EXTREMADAMENTE REACTIVO, NO SE MEZCLE CON NINGÚN RESIDUO O MATERIAL QUÍMICO.";

// Definir el mensaje y la clase de color correspondiente
if ($id_reg_grupo_sustancia1 == $id_reg_grupo_sustancia2) {
    $mensaje = "$msj1";
    $colorClass = "modal-green"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 2) || ($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 3) || ($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 4) || ($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 5) || ($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li> 
    
    <li>$P</li> 
    
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 5) || ($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li> 
    <br> 
    <li>$P</li> 
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 6) || ($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow";
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 7) || ($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow";
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li> 
    
    <li>$G</li> 
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li> 
    
    <li>$G</li> 
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li> 
    
    <li>$F</li> 
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gt</li> 
    <br> 
    <li>$gf</li> 
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$gt";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gt</li>  
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$S";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 27 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$msj1";
    $colorClass = "modal-green"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$gt</li>  
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$E</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$P</li>  
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$H";
    $colorClass = "modal-yellow"; 
} elseif (($id_reg_grupo_sustancia1 == 1 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 1)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 3) || ($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 2)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 4) || ($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 2)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 5) || ($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 2)) {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 6) || ($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 7) || ($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$gt</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$G</li>  
    <li>$T</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "$S";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$E</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$E</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$E</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$P</li>  
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$F</li>
    <li>$gt</li>  
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 2))  {
    $mensaje = "$H";
    $colorClass = "modal-yellow";  
}
elseif (($id_reg_grupo_sustancia1 == 2 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 2)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
//Grupo 3
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 4) || ($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 5) || ($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 6) || ($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 7) || ($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = $H ;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = $H ;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gf</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$G</li>  
    <li>$T</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gf</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = $gf;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = $S;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = $H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 27 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = $gt;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$E</li>  
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$P</li>  
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 3))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 3 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 3)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
//Grupo4
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 5) || ($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 6) || ($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 7) || ($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>  
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$gf</li>  
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 27 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$P</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$F</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 4))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 4 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 4)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 6) || ($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 7) || ($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = $H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = $H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = $H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "<ul>
    <li>$gf</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "<ul>
    <li>$gf</li>
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "<ul>
    <li>$gf</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 27 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje =$H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje =$H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "<ul>
    <li>$G</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = $H;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = $D;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "<ul>
    <li>$F</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "<ul>
    <li>$gf</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 5))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 5 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 5)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 7) || ($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "<ul>
    <li>$gf</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = $S;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 27 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
} elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "<ul>
    <li>$gt</li>
    <li>$H</li>
    <li>$F</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "<ul>
    <li>$gt</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 6)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 8) || ($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 6 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 6))  {
    $mensaje = $D;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$gt</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$P</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$gf</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 22) || ($id_reg_grupo_sustancia1 == 22 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 23) || ($id_reg_grupo_sustancia1 == 23 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 24) || ($id_reg_grupo_sustancia1 == 24 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje =$S;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 25) || ($id_reg_grupo_sustancia1 == 25 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 26) || ($id_reg_grupo_sustancia1 == 26 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 27) || ($id_reg_grupo_sustancia1 == 27 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 28) || ($id_reg_grupo_sustancia1 == 28 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 29) || ($id_reg_grupo_sustancia1 == 29 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 30) || ($id_reg_grupo_sustancia1 == 30 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$gt</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 31) || ($id_reg_grupo_sustancia1 == 31 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 32) || ($id_reg_grupo_sustancia1 == 32 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 33) || ($id_reg_grupo_sustancia1 == 33 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 34) || ($id_reg_grupo_sustancia1 == 34 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$P</li>
    <li>$H</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 35) || ($id_reg_grupo_sustancia1 == 35 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 36) || ($id_reg_grupo_sustancia1 == 36 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 37) || ($id_reg_grupo_sustancia1 == 37 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 38) || ($id_reg_grupo_sustancia1 == 38 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$F</li>
    <li>$H</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 39) || ($id_reg_grupo_sustancia1 == 39 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 40) || ($id_reg_grupo_sustancia1 == 40 && $id_reg_grupo_sustancia2 == 7))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 7 && $id_reg_grupo_sustancia2 == 41) || ($id_reg_grupo_sustancia1 == 41 && $id_reg_grupo_sustancia2 == 7)) {
    $mensaje = "$REACTIVO";
    $colorClass = "modal-yellow";
} 
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 9) || ($id_reg_grupo_sustancia1 == 9 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 10) || ($id_reg_grupo_sustancia1 == 10 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 11) || ($id_reg_grupo_sustancia1 == 11 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = $G;
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 12) || ($id_reg_grupo_sustancia1 == 12 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 13) || ($id_reg_grupo_sustancia1 == 13 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 14) || ($id_reg_grupo_sustancia1 == 14 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 15) || ($id_reg_grupo_sustancia1 == 15 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 16) || ($id_reg_grupo_sustancia1 == 16 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "$msj1";
    $colorClass = "modal-green";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 17) || ($id_reg_grupo_sustancia1 == 17 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 18) || ($id_reg_grupo_sustancia1 == 18 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 19) || ($id_reg_grupo_sustancia1 == 19 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 20) || ($id_reg_grupo_sustancia1 == 20 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$G</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$gf</li>
    </ul>";
    $colorClass = "modal-yellow";
}
elseif (($id_reg_grupo_sustancia1 == 8 && $id_reg_grupo_sustancia2 == 21) || ($id_reg_grupo_sustancia1 == 21 && $id_reg_grupo_sustancia2 == 8))  {
    $mensaje = "<ul>
    <li>$H</li>
    <li>$F</li>
    <li>$gt</li>
    </ul>";
    $colorClass = "modal-yellow";
}











else {
    $mensaje = "¡INCOMPATIBILIDAD! Las sustancias pertenecen a grupos diferentes.";
    $colorClass = "modal-red"; // Rojo para incompatibilidad
}

// Imprimir el resultado con la clase de color correspondiente
echo "<div id='resultadoModal' data-color-class='$colorClass'>$mensaje</div>";

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
