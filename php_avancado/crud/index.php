<?php
require 'banco.php';

$banco = new Banco("localhost", "blog", "root", "");

// $banco->query("SELECT * FROM posts");
// $numero = $banco->numRows();

// echo "Qtde de posts: ".$numero;
// echo "Qtde de posts: ".$banco->numRows();

// ------------------------------------------------------------

// print_r($banco->result());

/*if($banco->numRows() > 0) {
	foreach($banco->result() as $post) {
		echo "Titulo: ".$post['titulo']."<br/>";
		echo "Corpo: ".$post['corpo']."<br/>";
		echo "<hr>";
	}

} 
else {
	echo "Nenhum resultado.";
} */

// ------------------------------------------------------------

/*$banco->insert("posts", array("titulo" => 'Título de teste', 
							"corpo" => 'Corpo de teste'));*/

# $banco->update("posts", array("titulo"=>'Titulo teste'), array("id"=>'1'));
/*$banco->update("posts", 
	array("titulo"=>'Titulo teste'), 
	array("id"=>'1', "id2"=>'2'),
	"OR");*/

$banco->delete("posts", array("id"=>'2'));

?>