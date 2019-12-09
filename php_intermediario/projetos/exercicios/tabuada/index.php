<h1>Tabuada</h1>

<table border='1' width="300">
<?php
	for ($i=1; $i < 10; $i++) { 
		echo "<tr>";
		for ($j=1; $j < 10 ; $j++) { 
			$res = $i * $j;
			echo "<td>".$res."</td>";
		}
		echo "</tr>";
	}
?>
</table>