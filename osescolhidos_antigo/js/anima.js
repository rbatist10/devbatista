$(function(){

    var animacao = "animated flip";
    var fimAnimacao = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";

    $("#anima").click(function(e){

        $("#recebeAnimacao").addClass(animacao).one(fimAnimacao, function(){
           $(this).removeClass(animacao);
        });

        e.preventDefault();
    });

});