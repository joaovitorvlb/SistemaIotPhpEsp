<?php
$servername = "localhost";
$username = "mysql";
$password = "mysql";
$dbname = "cursoiot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if( isset($_POST['id']) ) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);

	if(isset($_POST['nome'])) {
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$sql = "UPDATE sensores SET nome='$nome' WHERE id='$id'";
	} else
	
	if(isset($_POST['valor'])) {
		$valor = mysqli_real_escape_string($conn, $_POST['valor']);
		$sql = "UPDATE sensores SET valor='$valor' WHERE id='$id'";
	} else 
	
	if(isset($_POST['timestamp'])) {
		$timestamp = mysqli_real_escape_string($conn, $_POST['timestamp']);
		$sql = "UPDATE sensores SET timestamp='$timestamp' WHERE id='$id'";
	} else {
	   echo "Erro1- por Falta de Parâmetro";
	   exit();	
	}

} else {
   echo "Erro2- por Falta de Parâmetros";
   exit();
}



if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
