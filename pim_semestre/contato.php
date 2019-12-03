<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" conten="ie=edge">
    <link rel="stylesheet" href="Style/style.css">
    <title>Smartcar</title>

    <script>
        function formatar(mascara, documento){
          var i = documento.value.length;
          var saida = mascara.substring(0,1);
          var texto = mascara.substring(i)
          
          if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
          }
          
        }
        </script>
</head>
<body>
    <header class="max-header">
        <div class="container">
            <div class="logo max-logo">
                <img src="imgs/omnitech-logo-1.png" alt="Logomarca da Omnitech" href="./login.php">
            </div>
            <div class="menu"></div>
                <div class="hamburguer"></div>
            <nav class="nav-bar max-nav">
                <ul>
                    <li><a href="./cadastro.php">Cadastro</a></li>
                    <li><a href="./consulta.php">Consulta</a></li>
                    <li><a href="./quemsomos.php">Quem Somos</a></li>
                    <li><a href="./contato.php">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="ghost"></section>
    <main>
        <section id="Contato">
            <form method="POST" action="salva_mensagem.php">
            Nome: <input type="text" name="nome" size="30" placeholder="Nome Completo" required></br>
            E-mail: <input type="email" name="email" size="30" placeholder="Seu melho e-mail" required></br>
            Assunto: <input type="text" name="assunto" size="27" placeholder="Assunto do contato" required></br>
            Mensagem: <textarea name="mensagem" size="20"></textarea></br></br>
            <input type="submit" value="Enviar">
        </form>
        </section>
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 