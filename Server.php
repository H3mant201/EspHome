<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sensors</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<table cellpadding="7px", style="width:80%" >
            <?php
            include 'config.php';
            $sql = "SELECT state FROM states where metadata_id = 8 ORDER BY state_id DESC LIMIT 1";
	    $sql2 = "SELECT state FROM states where metadata_id = 9 ORDER BY state_id DESC LIMIT 1";
	    $sql3 = "SELECT state FROM states where metadata_id = 6 ORDER BY state_id DESC LIMIT 1";
	    $sql4 = "SELECT state FROM states where metadata_id = 7 ORDER BY state_id DESC LIMIT 1";
	    $sql5 = "SELECT state FROM states where metadata_id = 10 ORDER BY state_id DESC LIMIT 1";
            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	    $result2 = mysqli_query($conn, $sql2) or die("Query Unsuccessful.");
	    $result3 = mysqli_query($conn, $sql3) or die("Query Unsuccessful.");
	    $result4 = mysqli_query($conn, $sql4) or die("Query Unsuccessful.");
	    $result5 = mysqli_query($conn, $sql5) or die("Query Unsuccessful.");
            while($row = mysqli_fetch_assoc($result)){
              $temp = $row['state'];
              ?>
           <?php }
	   while($row2 = mysqli_fetch_assoc($result2)){
              $hum = $row2['state'];
              ?>
	   <?php }
	   while($row3 = mysqli_fetch_assoc($result3)){
              $mot = $row3['state'];
              ?>
              <?php }
           while($row4 = mysqli_fetch_assoc($result4)){
              $smoke = $row4['state'];
              ?>
	   <?php }
           while($row5 = mysqli_fetch_assoc($result5)){
              $light = $row5['state'];
              ?>
	   <?php }
              mysqli_close($conn);
              ?>
<div class="sensor-container">
  <!-- Sensor de Temperatura -->
  <div class="sensor-box">
    <h2 class="sensor-title">Temperature</h2>
    <div class="sensor-value"><?php echo $temp; ?> °C</div>
  </div>

  <!-- Sensor de Humedad -->
  <div class="sensor-box">
    <h2 class="sensor-title">Humidity</h2>
    <div class="sensor-value"><?php echo $hum; ?>%</div>
  </div>

  <!-- Sensor de Movimiento -->
  <div class="sensor-box <?php echo ($mot == 'on') ? 'motion-on' : ''; ?>">
    <h2 class="sensor-title">Motion</h2>
    <div class="sensor-value"><?php echo $mot; ?></div>
  </div>

  <!-- Sensor de Humo -->
  <div class="sensor-box">
    <h2 class="sensor-title">Smoke</h2>
    <div class="sensor-value"><?php echo $smoke; ?>%</div>
  </div>

  <!-- Estado del Relay -->
  <div class="sensor-box">
    <h2 class="sensor-title">Relay</h2>
    <div class="sensor-value"><?php echo $light; ?></div>
  </div>
 
</div>

</table>
</html>
