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
        <section id="veiculo">
            <form method="POST" action="veiculo.php">
                <div>
                    Placa: <input type="text" name="placa" placeholder="Placa" required maxlength="8" OnKeyPress="formatar('###-.###', this)"></br>
                    Modelo: <input type="text" name="modelo" placeholder="Modelo do carro" required></br>
                    Ano: <input type="text" name="ano" placeholder="Ano de fabricação" required maxlength="4"></br>
                    <!-- Cor: <input type="text" name="cor" placeholder="Cor do veiculo" required></br> -->
                    Chassi: <input type="text" name="chassi" placeholder="Numero de chassi" required></br>
                    Quilometragem: <input type="text" name="quilometragem" placeholder="Numero de KM "></br>
                    Categoria: <input type="text" name="categoria" placeholder="Categoria" required></br>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </section>
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 