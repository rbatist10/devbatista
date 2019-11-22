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
            <form action="./index2.php#perfil">
                <div>
                    <label for="cpf">Digite seu CPF</label>
                    <input type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" >
                </div>
                <div class="button">
                    <input type="submit" name="enviar" value="enviar">
                </div>
            </form>
        </section>
        <section id="consulta">
            <form action="./index2.php#consulta">
                <div>
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" />
                </div>
                <div class="button">
                    <button type="submit">Pesquisar</button>
                </div>
            </form>
        </section>
        <section id="despesas">
            <form action="./index2.php#perfil#despesas">
                <div>
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" />
                </div>
                <div class="button">
                    <button type="submit">Pesquisar</button>
                </div>
            </form>
        </section>
        <section id="ajuda">
            <form action="./index2.php#ajuda">
                <div>
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" />
                </div>
                <div class="button">
                    <button type="submit">Pesquisar</button>
                </div>
            </form>
        </section>
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 