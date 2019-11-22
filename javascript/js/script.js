function validar() {
	var valor = document.getElementById("numero").value;

	if(valor.length > 2) { //length significa número de algarismos
		alert("Você digitou um número com mais de 2 algarismos");
		return false;
	} else {
		return true;
	}
}