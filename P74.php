<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DADES TAULA PERSONA</title>
</head>
<body>

<h1>Dades de la taula persona</h1>

<form method="post" action="P74.php">
NIE/NIF:<br>
    <input type="text" name="identificador">
    <br>
Nom:<br>
		<input type="text" name="nom">
		<br>
Cognom:<br>
		<input type="text" name="cognom">
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
   $identificador = $_POST["identificador"];
	 $nom = $_POST['nom'];
	 $cognom = $_POST['cognom'];
	 
	 $sql = "INSERT INTO persona (NIF, Nom, Cognom)
   VALUES ('$identificador','$nom','$cognom')";
   
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
  
</body>
</html>