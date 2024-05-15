<?php

include 'config.php';

$sql2 = "SELECT humo, time FROM humo";
$resultado2 = $conn->query($sql2);

$humo = array();
$horas3 = array();

while ($fila = $resultado2->fetch_assoc()) {
    $humo[] = $fila['humo'];
    $horas3[] = $fila['time'];
}

$conn->close();

echo json_encode(array('humo' => $humo, 'horas3' => $horas3));
?>
