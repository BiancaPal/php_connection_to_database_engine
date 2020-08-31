<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DADES TAULA RELLOTGERIA</title>
</head>
<body>

<h1>Dades de la taula rellotgeria</h1>

<?php

//connectar a la BBDD

$conn = mysqli_connect("localhost","root","","persona")
or die("Error".mysqli_error($conn));


//instrucció SQL per demanar a la BBDD
$sql = "SELECT * FROM persona" ;

$resultat=$conn->query($sql) or die ("falla l'sql");

while ($fila = mysqli_fetch_array($resultat)){
  $dades = count($fila)/2;
  echo "Fila: " . $dades. "<br />";

  for ($i = 0; $i < $dades ; $i++){
    echo $i." = ".$fila[$i]."<br />";
  }
}

$conn->close();
?>
  
</body>
</html>
