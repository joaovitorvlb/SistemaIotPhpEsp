<?php
$servername = "10.100.26.104";
$username = "root";
$password = "CHKplq37322";
$dbname = "cursoiot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$nome = null; 
$valor = null;
$timestamp = null; 

//http://localhost/site/query_insert_db.php 
//data:nome=Temperatura&valord=30&timestamp=123456789

if(isset( $_POST['nome'] ) && isset( $_POST['valor'] ) && isset( $_POST['timestamp'] ) ) {

	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$timestamp = mysqli_real_escape_string($conn, $_POST['timestamp']);	

	$timestamp = time();
	
} else {

   echo "Erro por Falta de Parâmetros";
   exit();
   
}

$sql="INSERT INTO sensores (nome, valor, timestamp)
VALUES ('$nome', '$valor', '$timestamp')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>



