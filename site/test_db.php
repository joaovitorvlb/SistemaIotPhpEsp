<?php
$servername = "10.100.26.104";
$username = "root";
$password = "CHKplq37322";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn2 = "teste";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

<html lang="en">
<head>
</head>
<body>
 <input id="<?php echo $conn2;?>" />
</body>
</html>



