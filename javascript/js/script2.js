function adicionarIngrediente() {
	//Pegando o valor digitado na tela do site
	var ing = document.getElementById("ingrediente").value;

	//Pegando o valor que já está no site para acrescentar ao novo
	var listahtml = document.getElementById("lista").innerHTML;

	//Acrescentando mais um ingrediente a lista
	listahtml = listahtml + "<li>"+ing+"</li>";

	//Inserindo na tela
	document.getElementById("lista").innerHTML = listahtml;
}