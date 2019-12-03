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
                <img src="imgs/omnitech-logo-1.png" alt="Logomarca da Omnitech">
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
        <section id="cliente">
            <form method="POST" action="cliente.php">
                <div>
                    Nome: <input type="text" name="nome" size="30" placeholder="Nome completo" required></br>
                    RG: <input type="text" name="rg" size="30" placeholder="Numero de RG" required maxlength="12" OnKeyPress="formatar('##.###.###-#', this)"></br>
                    CPF: <input type="text" name="cpf" size="30" placeholder="Numero de CPF" required maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"></br>
                    CNH: <input type="text" name="cnh" size="30" placeholder="Numero da CNH" required></br>
                    Email: <input type="email" name="email" size="30" placeholder="Seu Email" required></br>
                    Telefone: <input type="text" name="telefone" size="30" placeholder="Seu Telefone " maxlength="12" OnKeyPress="formatar('##.####-####', this)"></br>
                    Celular: <input type="text" name="celular"  placeholder="Seu Celular" required maxlength="14" OnKeyPress="formatar('##.####-####', this)"></br>
                    Endereço: <input type="text" name="endereco" placeholder="Seu Endereço" required></br>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </section>
        </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 