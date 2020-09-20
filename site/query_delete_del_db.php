<?php
//É posssível utilizar o POST para deletar, entretanto foi utilizado o DELETE para conhecimento.
$method = $_SERVER['REQUEST_METHOD'];
if ('DELETE' === $method) {
    parse_str(file_get_contents('php://input'), $_DELETE);
    //var_dump($_DELETE); //$_PUT contains put fields 
}
///--------------------------------------------------

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
if( isset($_DELETE['id']) ) {
	$id = mysqli_real_escape_string($conn, $_DELETE['id']);
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