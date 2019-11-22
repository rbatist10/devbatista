<?php
//sessão guarda informações no servidor
//cookie guarda informações no navegador

//COMO GERAR UMA SESSÃO
session_start(); //iniciar uma sessão
$_SESSION["teste"] = "Rafael Batista";
echo "Sessão foi feita";
//Como verificar a sessão
echo "Meu nome é: ".$_SESSION["teste"];

//-------------------------------------------------

//COMO GERAR COOKIE
setcookie("meuteste", "Novo teste" time()+3600); //cria cookie para deixar registrado por 1 hora no navegador
echo "Cookie iniciado";
//Logo depois
echo "Cookie registrado: ".$_COOKIE["meuteste"];

?>