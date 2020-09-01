<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DADES TAULA PERSONA</title>
</head>
<body>

<h1>Dades de la taula persona</h1>

<form method="post" action="P76.php">

Nom:<br>
		<input type="text" name="nom">
		<br>

<input type="submit" name="save" value="submit">
	
	</form>

<?php

//connectar a la BBDD

$conn = mysqli_connect("localhost","root","","persona")
or die("Error".mysqli_error($conn));


//instrucció SQL per demanar a la BBDD

if(isset($_POST['save']))
{	 
   
	 $nom = $_POST['nom'];
	 
	 $sql = "SELECT * FROM persona 
   WHERE nom = 'Bianca' ";

   $result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "NIF/NIE: " . $row["NIF"]. " - Nom i Cognom: " . $row["Nom"]. " " . $row["Cognom"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
} 


?>
  
</body>
</html>