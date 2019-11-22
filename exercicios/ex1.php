<form method="POST">
	<input type="text" name="num1" /><br/><br/>	
	<input type="text" name="num2" /><br/><br/>
	<input type="submit" value="Enviar" />
</form>

<?php
if(isset($_POST['num1']) && empty($_POST['num1']) == false) {
	$num1 = $_POST['num1'];
	$num2 = $_POST['num2'];

	$res = $num1 + $num2;

	if($res > '20') {
		echo $res." + 8<br>";
		$res = $res + 8;
		echo $res;
	} else {
		echo $res." - 5<br>";
		$res = $res - 5;
		echo $res;
	}
}
?>