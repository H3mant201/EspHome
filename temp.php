<?php

include 'config.php';

$sql = "SELECT state2, dia FROM temperatura";
$resultado = $conn->query($sql);

$temperatura = array();
$horas4 = array();

while ($fila = $resultado->fetch_assoc()) {
    $temperatura[] = $fila['state2'];
    $horas4[] = $fila['dia'];
}

$conn->close();

echo json_encode(array('temperatura' => $temperatura, 'horas4' => $horas4));


?>
