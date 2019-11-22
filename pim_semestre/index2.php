<?php
require 'conexao.php';
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
                    <li><a href="#perfil">Perfil</a></li>
                    <li><a href="#consulta">Consulta</a></li>
                    <li><a href="#despesas">Despesas</a></li>
                    <li><a href="#ajuda">Ajuda</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="ghost"></section>
    <main>
        <section id="perfil">
            <form method="POST" action="cliente.php">
                <div>
                    Nome: <input type="text" name="nome" placeholder="Nome completo" required></br>
                    RG: <input type="text" name="rg" placeholder="Numero de RG" required maxlength="12" OnKeyPress="formatar('##.###.###-#', this)"></br>
                    CPF: <input type="text" name="cpf" placeholder="Numero de CPF" required maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"></br>
                    CNH: <input type="text" name="cnh" placeholder="Numero da CNH" required></br>
                    Email: <input type="email" name="email" placeholder="Seu Email" required></br>
                    Telefone: <input type="text" name="telefone" placeholder="Seu Telefone " maxlength="12" OnKeyPress="formatar('##.####-####', this)"></br>
                    Celular: <input type="text" name="celular" placeholder="Seu Celular" required maxlength="14" OnKeyPress="formatar('##.#####-####', this)"></br>
                    Endereço: <input type="text" name="endereco" placeholder="Seu Endereço" required></br>
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </section>
        <section id="consulta">
            <form action="#consulta">
                <div>
                    Placa: <input type="text" name="placa" placeholder="Placa" required maxlength="7" OnKeyPress="formatar('###-.###', this)"></br>
                    Modelo: <input type="text" name="modelo" placeholder="Modelo do carro" required></br>
                    Ano: <input type="text" name="ano" placeholder="Ano de fabricação" required maxlength="4"></br>
                    Cor: <input type="text" name="cor" placeholder="Cor do veiculo" required></br>
                    Chassi: <input type="email" name="chassi" placeholder="Numero de chassi" required></br>
                    Quilometragem: <input type="text" name="qulometragem" placeholder="Numero de KM "></br>
                    Categoria: <input type="text" name="categoria" placeholder="Categoria" required></br>
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </div>
            </form>
        </section>
        <section id="despesas">Despesas</section>
        <section id="ajuda">Ajuda</section>
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 
?>