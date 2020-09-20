<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cursoiot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = null; 
if( isset($_POST['id']) ) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
} else {
   echo "Erro por Falta de Parâmetros";
   exit();
}

$sql = "DELETE FROM sensores WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>