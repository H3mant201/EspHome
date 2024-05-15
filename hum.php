<?php

include 'config.php';

$sql2 = "SELECT humedad, time FROM humedad";
$resultado2 = $conn->query($sql2);

$hum = array();
$horas2 = array();

while ($fila = $resultado2->fetch_assoc()) {
    $hum[] = $fila['humedad'];
    $horas2[] = $fila['time'];
}

$conn->close();

echo json_encode(array('hum' => $hum, 'horas2' => $horas2));
?>

