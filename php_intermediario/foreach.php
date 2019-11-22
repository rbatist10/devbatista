<?php

/*$nomes = array("Teste1","Teste2","Teste3","Teste4");

foreach($nomes as $aluno) {
	echo "Aluno: ".$aluno."<br/>";	
}*/

/*$nomes = array(
	array("nome"=>"Rafael","idade"=>23),
	array("nome"=>"Cassio","idade"=>24),
	array("nome"=>"Tevez","idade"=>24),
	array("nome"=>"Teste","idade"=>22)
);

foreach($nomes as $aluno) {
	echo "Aluno: ".$aluno["nome"]." - Idade: ".$aluno["idade"]."<br/>";
}*/

$nomes = array(
	"nome" => "Rafael",
	"idade" => 23,
	"estado" => "SP",
	"pais" => "Brasil"
);

foreach($nomes as $chave => $dado) {
	echo $chave." = ".$dado."<br/>";
}

?>
