<?php

include 'config.php';

$sql = "SELECT relay, time FROM relay";
$resultado = $conn->query($sql);

$data = array();

while ($fila = $resultado->fetch_assoc()) {
    $data[] = array(
        'state' => $fila['relay'],
        'time' => $fila['time']
    );
}

$conn->close();

echo json_encode($data);
?>
