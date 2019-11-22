function Animal() {
	this.raca = "Cao";
	this.nome = "Lulu";
	this.idade = 200;
	this.peso = 10;

	this.fazerXixi = function() {
		console.log("xiiiiii...");
	}

	this.comer = function(kg) {
		for(var i=0;i<kg;i++) {
			this.mastigar();
		}
		console.log("hummm...");
		this.peso = this.peso + (kg/2);
	}

	this.mastigar = function() {
		console.log(i+" - Nhoc...");
	}

}

var lulu = new Animal();
lulu.raca = "Gato";
lulu.nome = "Lulu";
lulu.comer(10);

var xuxu = new Animal();
xuxu.nome = "Xuxu";
xuxu.raca = "Cao";