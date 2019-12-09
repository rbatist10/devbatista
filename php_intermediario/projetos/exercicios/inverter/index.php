<h1>Inverter string</h1>
<form method="POST">
	<input type="text" name="string"><br><br>
	<input type="submit" name="Inverter"><br>
</form>
<hr>
<?php 
	if (!empty($_POST['string'])) {
		
		$newstring = strrev($_POST['string']);

		echo $newstring;
	}
?>