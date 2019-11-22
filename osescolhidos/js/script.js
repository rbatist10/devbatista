function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

  if (texto.substring(0,1) != saida){
           documento.value += texto.substring(0,1);
  }
}

$(function(){
  	$("#divContato").click(function(event) {
    event.preventDefault();
    var idElemento = $(this).attr("href");
    var deslocamento = $(idElemento).offset().top;
    $('html, body').animate({ scrollTop: deslocamento }, 'slow');
	});
});

// -------------------------------------------------------------
// -------------------------------------------------------------

function desativadoTecnicos() {
  alert("Em Breve");
}

function desativadoInscricao() {
  alert("Inscrições abertas após 10/09/2018 às 0h !!!");
  window.location="./";
}

// ------------------------------------
// ------------------------------------

function addContato() {
  var contato = document.getElementById("link-contato");
  var home = document.getElementById("link-home");
  contato.classList.add("active");
  home.classList.remove("active");

}

$('.nav-link').on('click', function(){
   $('.navbar-collapse').collapse('hide');
});

$('#alterar-senha').on('click', function() {
  alert("Senha alterada com sucesso!");
});

// ------------------------------------
// ------------------------------------

document.getElementById("data_nascimento_cavalheiro").addEventListener('change', function() {
  var data = new Date(this.value);
  if(isDate_(this.value) && data.getFullYear() > 1900 && data.getFullYear() <= 2018)
      document.getElementById("idade_c").value = calculateAge(this.value);
});

document.getElementById("data_nascimento_dama").addEventListener('change', function() {
  var data = new Date(this.value);
  if(isDate_(this.value) && data.getFullYear() > 1900 && data.getFullYear() <= 2018)
      document.getElementById("idade_d").value = calculateAge(this.value);
});

function calculateAge(dobString) {
  var dob = new Date(dobString);
  var currentDate = new Date();
  var currentYear = currentDate.getFullYear();
  var birthdayThisYear = new Date(currentYear, dob.getMonth(), dob.getDate());
  var age = currentYear - dob.getFullYear();
  if(birthdayThisYear > currentDate) {
    age--;
  }
  return age;
}

function calcular(data) {
  var data = document.form.nascimento.value;
  alert(data);
  var partes = data.split("/");
  var junta = partes[2]+"-"+partes[1]+"-"+partes[0];
  document.form.idade_c.value = (calculateAge(junta));
}

var isDate_ = function(input) {
        var status = false;
        if (!input || input.length <= 0) {
          status = false;
        } else {
          var result = new Date(input);
          if (result == 'Invalid Date') {
            status = false;
          } else {
            status = true;
          }
        }
        return status;
}

$('#data_nascimento_cavalheiro').blur(function(){
if($('#idade_c').val()<18) {
    $('.responsavel-c').css('display', 'block');
  }
  else {
    $('.responsavel-c').css('display', 'none');
  }
});

$('#data_nascimento_dama').blur(function(){
if($('#idade_d').val()<18) {
    $('.responsavel-d').css('display', 'block');
  }
  else {
    $('.responsavel-d').css('display', 'none');
  }
});

$('input').keyup(function() {
if($(this).val().length > 0 ) {
    $('#inscrever-se').attr('disabled', false);
  } 
  else {
    $('#inscrever-se').attr('disabled', true);
  }
});

$('#inscrever-se').on('click', function() {
  alert("Bem vindo ao campeonato Os Escolhidos - Edição Especial! Você receberá as instruções de pagamento no email junto com o número de inscrição");
});