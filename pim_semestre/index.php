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
        <section id="">
            <form action="./index2.php#cliente">
                <div>
                    SEJA BEM-VINDO
                </div>
            </form>
        </section>
        <!-- <section id="cadastro">
            <form action="./index2.php#cliente">
                <div>
                    <label for="cpf">Cadastro de Cliente</label>
                </div>
                <div class="button">
                    <input type="submit" name="enviar" value="enviar">
                </div>
            </form>
            <form action="./index2.php#veiculo">
                <div>
                    <label for="cpf">Cadastro de Automovel</label>
                </div>
                <div class="button">
                    <input type="submit" name="enviar" value="enviar">
                </div>
            </form>
        </section>
        <section id="consulta">
            <form action="./index2.php#cliente">
                <div>
                    <label for="cpf">Consulta de Cliente</label>
                </div>
                <div class="button">
                    <input type="submit" name="enviar" value="enviar">
                </div>
            </form>
            <form action="./index2.php#veiculo">
                <div>
                    <label for="cpf">Consulta de Automovel</label>
                </div>
                <div class="button">
                    <input type="submit" name="enviar" value="enviar">
                </div>
            </form>
        </section>
        <section id="quemsomos">
            <form action="http://localhost/Omnitech/index2.html#consulta">
                <div>
                    <label for="cidade">Quem Somos:</label>
                </div>
            </form>
        </section>
        <section id="contato">
            <form action="http://localhost/Omnitech/index2.html#perfil#despesas">
                <div>
                    <label for="contato">Contato:</label>
                    <input type="text" id="contato" />
                </div>
                <div class="button">
                    <button type="submit">Pesquisar</button>
                </div>
            </form>
        </section> -->
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 