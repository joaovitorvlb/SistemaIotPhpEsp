<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Envia msg via mqtt</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>

<script>

function SendToMqtt() {
      var valor_sensor = $('#valor').val();
      $.ajax({
        url:"mqtt/publish.php", //the page containing php script
        type: "POST", //request type
		dataType: 'html',
        data: {valor: valor_sensor},
        success:function(result){
         alert(result);
       }
     });
 }
</script>

<button type="button" onclick="SendToMqtt()">Click Me</button>
<input type="text"


<input type="text" name="valor" id="valor">

</body>
</html>




