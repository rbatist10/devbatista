const a = 10;
const b = 33;

function somar(a,b){
	return a + b;
}

document.querySelector("#btn-calcular").addEventListener("click", function () {
	let valorA = document.querySelector("#valor-a").value;
	let valorB = document.querySelector("#valor-b").value;

	alert(parseInt(valorA) + parseInt(valorB));
} );