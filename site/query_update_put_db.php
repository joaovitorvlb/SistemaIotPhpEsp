<?php

$method = $_SERVER['REQUEST_METHOD'];
if ('PUT' === $method) {
    parse_str(file_get_contents('php://input'), $_PUT);
    //var_dump($_PUT); //$_PUT contains put fields 
}


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

if( isset($_PUT['id']) ) {
	$id = mysqli_real_escape_string($conn, $_PUT['id']);

	if(isset($_PUT['nome'])) {
		$nome = mysqli_real_escape_string($conn, $_PUT['nome']);
		$sql = "UPDATE sensores SET nome='$nome' WHERE id='$id'";
	} else
	
	if(isset($_PUT['valor'])) {
		$valor = mysqli_real_escape_string($conn, $_PUT['valor']);
		$sql = "UPDATE sensores SET valor='$valor' WHERE id='$id'";
	} else 
	
	if(isset($_PUT['timestamp'])) {
		$timestamp = mysqli_real_escape_string($conn, $_PUT['timestamp']);
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
