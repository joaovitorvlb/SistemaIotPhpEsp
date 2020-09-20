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

$id=""; 
$myArr = array(); 
$myJSON = null;

if( isset($_GET['id']) ) {
	$id = mysqli_real_escape_string($conn, $_GET['id']);
} else {
	echo "Erro por Falta de Parâmetros";
	exit();
}

$sql = "SELECT id, nome, valor, timestamp FROM sensores WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
		$myArr = array('id'=>$row["id"], 'valor'=> $row["valor"], 'nome'=> $row["nome"], 'timestamp'=> $row["timestamp"]);
        $myJSON = json_encode($myArr, JSON_NUMERIC_CHECK);
        echo $myJSON;
    }
} else {
    echo "0 results";
}
$conn->close();
?>