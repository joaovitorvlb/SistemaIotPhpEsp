<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="query_insert_db.php" method="post" target="_self">
    <p>
        <label for="Nome">Nome do Sensor:</label>
        <input type="text" name="nome" id="nome">
    </p>
    <p>
        <label for="valor">Valor:</label>
        <input type="text" name="valor" id="valor">
    </p>
    <p>
        <label for="timestamp">Timestamp:</label>
        <input type="text" name="timestamp" id="timestamp">
    </p>
    <input type="submit" value="Submit">
</form>
</body>
</html>




