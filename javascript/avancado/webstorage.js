if(typeof localStorage.nome == "undefined") {
	localStorage.nome = prompt("Qual o seu nome?");
}

// nome = localStorage.nome;
// document.getElementById("info").innerHTML = nome;

document.getElementById("info").innerHTML = localStorage.nome;

// localStorage é removido só quando for solicitado
// sessionStorage é removido assim que fecha o navegador