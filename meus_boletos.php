<!DOCTYPE HTML>
<html class="iFractalSiteBase" lang="pt-BR">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!--
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="cache-control" content="no-cache" />
-->

<title>ifClick - Portal de Boletos</title>

<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="css/meus_boletos_srv.css" />
<link rel="shortcut icon" type="image/ico" href="imagens/favicon-ifclick.icon" />

<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery_UI.js"></script>
<script type="text/javascript" src="js/meus_boletos.js?6"></script>
<script type="text/javascript" src="js/i.mustfill.placeholder.v2.js?5"></script>
<script type="text/javascript" src="js/validate_cpf_cnpj2.js"></script>
<script type="text/javascript">
	
	//Faz input ser de data, chame passando o el input e pronto
	function formataDataInput(el)
	{
		if (el.has_listener !== undefined)
			return;
		el.has_listener = true;
		el.is_holding = 0;
		el.onkeypress =  function (ev)
		{
			el.is_holding++;
			el.can_pass = "Formato incorreto de data";
			this.all_length = this.value.length;
			if (el.is_holding > 1)
				return false;
			el.value = el.value.replace(/[^0-9, \/]/g, "");
//			el.value = el.value.replace(/\//g, "");
			if (ev.shiftKey || ev.altKey || ev.ctrlKey)
				return false;
		};
		el.onkeyup = function (ev)
		{
			el.is_holding = 0;
			el.value = el.value.replace(/[^0-9, \/]/g, "");
			el.value = el.value.substring(0, 10);
			if((el.value.length == 2 || el.value.length == 5) && this.value.length >= this.all_length)
				el.value += "/";
			if (this.value.length == 10)
				el.can_pass = undefined;
		
		};
	}
	function l2FormActHelper(iAction, extra_fields) //Esse extra_fields nao guarda apenas os filtors dos campos extras, guarda configuracoes de colunas extras e configuraceos de login tambem 
	{
		if (iAction == "iBring") {
			var l2InnerGlass = '';
			l2InnerGlass += '<div style="position:relative; z-index:7;">';
				l2InnerGlass += '<div style="padding:50px;overflow:hidden;">';
					l2InnerGlass += '<form method="POST" action="#" name="l2FormLogin" id="l2FormLogin">';
												
					l2InnerGlass += '<div class="iMustFillPlaceholderV3" style="width:100%; margin-bottom:20px;">';
					//putBack
						var has_cpf = ((extra_fields.filter_cpf !== undefined && extra_fields.filter_cpf)?"iCpf":"cpf-no-filter");
						l2InnerGlass += '<input type="text" name="cpf" id="'+has_cpf+'" class="iInputMP3" autocomplete="off" tabindex="1"/>';
						l2InnerGlass += '<label for="'+has_cpf+'" style="font-size:15px; top:4px;">CPF/CNPJ</label>';
					l2InnerGlass += '</div>';
					var margin_top = [50, 68];
					var renderers = [];
					if (extra_fields.fields !== undefined) {
							margin_top = [20, 38];
							for (var i in extra_fields.fields) {
								l2InnerGlass += '<div class="iMustFillPlaceholderV3" style="width:100%;margin-bottom:20px;">';
									var renderer = ((extra_fields.fields[i].renderer === undefined)?false:extra_fields.fields[i].renderer);

									if (!renderer)
										l2InnerGlass += '<input type="text" name="'+i+'" id="'+i+'" class="iInputMP3" autocomplete="off" tabindex="2" />';
									else
									{
										l2InnerGlass += '<input type="text" name="'+i+'" id="'+i+'" class="iInputMP3 '+renderer+'" autocomplete="off" tabindex="2" />';
										renderers.push(renderer);
									}

									l2InnerGlass += '<label for="'+i+'" style="font-size:15px; top:4px;">'+extra_fields.fields[i].label+'</label>';
								l2InnerGlass += '</div>';
							}
					}
//					l2InnerGlass += '<div class="iMustFillPlaceholderV3">';
//					l2InnerGlass += '<input type="text" name="ct_captcha" id="captcha" class="iInputMP3" autocomplete="off" tabindex="2"/>';
//					l2InnerGlass += '<label for="captcha" style="font-size:15px; top:4px;">Captcha code</label>';
//					l2InnerGlass += '</div>';
//TODO
					l2InnerGlass += '<div class="g-recaptcha l2Left alert-captcha" style="margin-top:'+margin_top[0]+'px;" data-sitekey="6Ldz0QkTAAAAADrU6Bq1fjlf2lGgYNti9GSOeG9T"></div>';
//					l2InnerGlass += '<div class="l2Left" style="margin-top:'+margin_top[0]+'px;"><img src="" id="captcha_img" border="0" height="70" />';
//					l2InnerGlass += '</div>';
//					l2InnerGlass += '<div class="l2Left reloadCont" style="margin-top:'+margin_top[1]+'px; margin-left:15px; cursor:pointer;"><img style="display:block;" src="imagens/login_meus_boletos/icon-giro.png" alt="Reload" border="0" height="33" />';
//					l2InnerGlass += '</div>';

					l2InnerGlass += '<div class="l2Right" style="margin-top:'+(margin_top[0]+15)+'px;margin-bottom:40px;"><div class="l2FormAccess"></div>';
					l2InnerGlass += '</div>';
					l2InnerGlass += '';
					l2InnerGlass += '</form>';
				l2InnerGlass += '</div>';
			l2InnerGlass += '</div>';
			$("body").append("<div class='l2Glass'></div>");
			$(".l2Glass").append(l2InnerGlass);
			iLoadInputs($("input"), "iMustFillMP2");
								
/*			$(".reloadCont").click(function ()
			{
				document.getElementById('captcha_img').src = 'securimage/securimage_show.php?sid='+Math.random();					
			});
*/
			for (var k = 0; k < renderers.length; k++)
			{
				var els = document.getElementsByClassName(renderers[k]);
				for (var j = 0; j < els.length; j++)
					eval(renderers[k] + "(els[j])");
			}

			$(".reloadCont").trigger("click");
			$(".iInputMP3").keydown(function (e)
			{
				if (e.keyCode==13) {
					$(".l2FormAccess").click();
				}
			});
			$(".l2FormAccess").click(function ()
			{
				
				if (!iMCheckBlankV2(0, $(".iInputMP3").length - 1, "noexception", $(".iInputMP3"), "iMustFillMP2", "Requerido"))
					return;

				bringModal("bring");
				document.forms['l2FormLogin'].action = "meus_boletos.php";
				document.forms['l2FormLogin'].submit();
				return;

			});
			var lg = $(".l2Glass");
			var measures = [lg.outerWidth(), lg.outerHeight()];

			lg.css({width:"0px", height:"0px"});
			lg.css({"top":($(window).height()-lg.height())/2-50+"px", "left":($(window).width()-lg.width())/2+"px"});
			lg.animate({opacity:1, width:measures[0]+"px", height:measures[1]+"px", left:"-="+(Math.ceil(measures[0]/2))+"px", top:"-="+(Math.ceil(measures[1]/2))+"px"}, 1000, "swing", function ()
			{
				//	$(".l2Menu").css("overflow", "hidden");
				document.l2FormLogin.cpf.focus();
				$(document.l2FormLogin.cpf).blur(function ()
				{
					$(".alert-captcha").removeClass("blink");
				});

			});
		} 
	} 
	$(window).resize(function ()
	{
		$(".l2Glass").css("top", ($(window).height()-$(".l2Glass").height())/2-50+"px");
		$(".l2Glass").css("left", ($(window).width()-$(".l2Glass").width())/2+"px");
		$(".l2FooterCont").css("left", ((window.innerWidth || document.documentElement.clientWidth)-1000)/2+"px");
		$(".l2FooterCont").css("top", ($(window).height() - $(".l2FooterCont").outerHeight()-25)+"px");
	});

	$(document).ready(function ()
	{
		$("body").css({"min-height":window.innerHeight||document.documentElement.clientHeight});
		var expecting_json_string = new String('');

		try {
			expecting_json_string = jQuery.parseJSON(expecting_json_string);
			l2FormActHelper("iBring", expecting_json_string);
		} catch (err)
		{
			expecting_json_string = new Object();
			l2FormActHelper("iBring", expecting_json_string);
		}
		$("input").keydown(function (e)
		{
			if (e.keyCode==13) {
				$(".l2AccessBt").click();
			}
		});
		$(".l2FooterCont").css("left", ((window.innerWidth || document.documentElement.clientWidth)-1000)/2+"px");
		$(".l2FooterCont").css("top", ($(window).height() - $(".l2FooterCont").outerHeight()-25)+"px");
		
	});
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body style="position:relative;">

	<div class="l2Welcome">Bem-vindo, por favor entre com seus dados abaixo.
	</div>
	<div class="l2FooterCont">	
		<div class="l2Footer">
			<div class="l2Left" style = "padding:15px; border-radius: 15px;background-color:white"><img src="fotos/empresa/1507042249jarezende.png" height = 60 alt = "" /></div>
			<div class="greySiinEntrance"><img src="imagens/login/grey_siin.png" width="39" height="35" alt="Serviço de Integração Inteligente nas Nuvens" /></div>
		</div>
		<div class="l2FooterSign">Caso boleto não esteja disponível, retornar contato no atendimento ou pelo site: jarezende.com.br		</div>
	</div>
	<div class="l2PreLoad">
		<img src="imagens/login/glass_w.png" />
	</div>


<!--[if lt IE 9]>
<script type="text/javascript">
function exitIE(config)
{
var docwh = [document.documentElement.clientWidth, document.documentElement.clientHeight];
window.onload = function ()
{
	setTimeout(function ()
	{
		$("input").remove();
	},2000);
	document.body.innerHTML += "<div id='cont-ie' style='z-index:200;position:fixed;top:0px;left:0px;width:"+docwh[0]+"px;height:"+docwh[1]+"px;'><div style='width:100%;height:100%;position:absolute;left:0px;top:0px;background-color:"+config.bg+";filter:alpha(opacity=70);z-index:1;'></div><a href='https://www.google.com.br/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=Qual+navegador+devo+usar+%3F' style='text-decoration:none;color:black;'><div style='margin:0 auto;top:100px;position:relative;z-index:2;width:"+Math.floor(docwh[0]/2)+"px;padding:50px;background-color:white;color:black;font-family:'Roboto', 'RobotoCondensed', 'arial';'><p style='margin-top:0px;font-size:30px;text-align:center;'>Ops!</p><div style='text-align:center;font-size:17px;'>"+config.msg+"</div></div></a></div>";
var cont_ie = document.getElementById("cont-ie");
window.onresize = function ()
{
	cont_ie.style.width = document.documentElement.clientWidth+"px";
	cont_ie.style.height = document.documentElement.clientHeight+"px";
}
}
}
exitIE({bg:"black", msg:"<p>O seu navegador não possui as tecnologias mais recentes para interagir com esta página de modo seguro.</p><p>Recomendamos que atualize o seu navegador para uma versão superior.</p>"});
</script>
<![endif]-->
<FORM id='form_gera_arq' name='form_gera_arq' method='POST' action='' target='_blank' style="display:none;"></FORM>
</body>
</html>
