$(document).ready(function () {

        $('body').css("padding-right: 0;");

        /* animação fezinho e lala */

		var tamanho1 = 0; 

		var imagens1 = ['img/fezinho.jpg', 'img/lala.jpg'];

	    var img1 = $('#tecnicos1 img');

    	function rodarTecnicos1() {

            img1.addClass("animated flipOutY").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
                $(this).removeClass("animated flipOutY");

                img1.attr('src', imagens1[tamanho1]);
            
                if (tamanho1 >= imagens1.length){
                    tamanho1 = 0;
                }
                else{
                    tamanho1 ++;   
                }

                setTimeout(rodarTecnicos1, 1500);
            });

    	}

        var imgPerfil1 = $('#tecnicosPerfil1 img');

        function rodarTecnicosPerfilFeLala() {

                imgPerfil1.attr('src', imagens1[tamanho1]);
            
                if (tamanho1 >= imagens1.length){
                    tamanho1 = 0;
                }
                else{
                    tamanho1 ++;   
                }

                setTimeout(rodarTecnicosPerfilFeLala, 1500);

        }  

        rodarTecnicosPerfilFeLala();

        /* animação vini e karine */

    	var tamanho2 = 0; 

		var imagens2 = ['img/karine.jpg', 'img/vini.jpg'];

	    var img2 = $('#tecnicos2 img');

    	function rodarTecnicos2() {

            img2.addClass("animated flipOutY").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
                $(this).removeClass("animated flipOutY");

                img2.attr('src', imagens2[tamanho2]);
                if (tamanho2 >= imagens2.length){
                    tamanho2 = 0;
                }
                else{
                    tamanho2 ++;
                }
                setTimeout(rodarTecnicos2, 1500);
            });
    	}

        var imgPerfil2 = $('#tecnicosPerfil2 img');

        function rodarTecnicosPerfilViniKarine() {

                imgPerfil2.attr('src', imagens2[tamanho2]);
            
                if (tamanho2 >= imagens2.length){
                    tamanho2 = 0;
                }
                else{
                    tamanho2 ++;   
                }

                setTimeout(rodarTecnicosPerfilViniKarine, 1500);

        }  

        rodarTecnicosPerfilViniKarine();

        /* animação breno e nath */

    	var tamanho3 = 0; 

		var imagens3 = ['img/breno.jpg', 'img/nath.jpg'];

	    var img3 = $('#tecnicos3 img');

    	function rodarTecnicos3() {

            img3.addClass("animated flipOutY").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
                $(this).removeClass("animated flipOutY");

                img3.attr('src', imagens3[tamanho3]);
                if (tamanho3 >= imagens3.length){
                    tamanho3 = 0;
                }
                else{
                    tamanho3 ++;
                }
                setTimeout(rodarTecnicos3, 1500);
            });
    	} 

        var imgPerfil3 = $('#tecnicosPerfil3 img');

        function rodarTecnicosPerfilBrenoNath() {

                imgPerfil3.attr('src', imagens3[tamanho3]);
            
                if (tamanho3 >= imagens3.length){
                    tamanho3 = 0;
                }
                else{
                    tamanho3 ++;   
                }

                setTimeout(rodarTecnicosPerfilBrenoNath, 1500);

        }  

        rodarTecnicosPerfilBrenoNath();

        /* animação rodrigo e dani */

    	var tamanho4 = 0; 

		var imagens4 = ['img/dani.jpg', 'img/rodrigo.jpg'];

	    var img4 = $('#tecnicos4 img');

    	function rodarTecnicos4() {

            img4.addClass("animated flipOutY").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function(){
                $(this).removeClass("animated flipOutY");

                img4.attr('src', imagens4[tamanho4]);
                if (tamanho4 >= imagens4.length){
                    tamanho4 = 0;
                }   
                else{
                    tamanho4 ++;
                }
                setTimeout(rodarTecnicos4, 1500);
            });
    	} 

        var imgPerfil4 = $('#tecnicosPerfil4 img');

        function rodarTecnicosPerfilRodrigoDani() {

                imgPerfil4.attr('src', imagens4[tamanho4]);
            
                if (tamanho4 >= imagens4.length){
                    tamanho4 = 0;
                }
                else{
                    tamanho4 ++;   
                }

                setTimeout(rodarTecnicosPerfilRodrigoDani, 1500);

        }  

        rodarTecnicosPerfilRodrigoDani();

    	rodarTecnicos1();
    	rodarTecnicos2();
    	rodarTecnicos3();
    	rodarTecnicos4();

    	$(function(){

		  	$("#link a").click(function(event) {

		    event.preventDefault();

		    var idElemento = $(this).attr("href");

		    var deslocamento = $(idElemento).offset().top;

		    $('html, body').animate({ scrollTop: deslocamento }, 'slow');

			});

		});

        // $(document).on('scroll', function(){
            
        // });

        $(document).scroll(function(){
            $('#ulPrincipal').removeClass("animated slideOutUp");
            $('#ulPrincipal').addClass("animated slideInDown");
        });

        function removeScrollTela () {
            $('#ulPrincipal').removeClass("animated slideInDown");
            $('#ulPrincipal').addClass("animated slideOutUp");

            setTimeout(removeScrollTela, 5000); 
        }

        // window.addEventListener("scroll", scrollTela);
        removeScrollTela();

        // function showModal (valorUrl) {
        //     $('#bg').style.display = 'block';
        //     $('#bgVideo').src = 'upload/'+valorUrl;
        // }

        // $('#abrirModal').click(function() {
        //     $('#bg').style.display = 'block';
        // });

        var progressbox = $('#progressbox');
        var progressbar = $('#progressbar');
        var progress = $('#progress');
        var completed = "0 %";

        var options = {
            beforeSubmit : beforeSubmit,
            uploadProgress : uploadProgress,
            success : afterSuccess, 
            resetForm : true
        };

        $('#uploadForm').submit(function() {
            $(this).ajaxSubmit(options);
            return false;
        });

        function uploadProgress (event, position, total, percentCompleto) {
            progressbar.width(percentCompleto + "%");
            progress.html(percentCompleto + "%");
            $('#output').html(" ");
        }

        function afterSuccess () {
            $('html, body').innerHTML = location.reload();

            setTimeout(afterSuccess, 2000);
        }

        function beforeSubmit () {
            if (!$('#uploadFile').val()) {
                $('#output').html("Por favor selecione um arquivo !");
                return false;
            }
            progressbar.width(completed);
            progress.html(completed);
        }
});