<?php 

include('conexao.php');


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
        <section>
        <table border="1">
            <tr>
                <td width="1500" aling="center" bgcolor="c5eff7">Nome</td>
                <td width="250" aling="center" bgcolor="c5eff7">Rg</td>
                <td width="450" aling="center" bgcolor="c5eff7">Cpf</td>
                <td width="250" aling="center" bgcolor="c5eff7">Cnh</td>
                <td width="250" aling="center" bgcolor="c5eff7">Email</td>
                <td width="750" aling="center" bgcolor="c5eff7">Telefone</td>
                <td width="1050" aling="center" bgcolor="c5eff7">Celular</td>
                <td width="2500" aling="center" bgcolor="c5eff7">Endereço</td>
            </tr>
            <?php  

            if(isset($_POST['cpf'])){
                $cpf = $_POST['cpf'];

                $sql = "SELECT * FROM cliente WHERE CPF = :cpf";
                $sql = $db->prepare($sql);
                $sql->bindValue(':cpf', $cpf);
                $sql->execute();

            if($sql->rowCount() > 0) {

                foreach($sql->fetchAll() as $dado): ?>
                    <tr>
                        <td><?php echo $dado["Nome"]; ?></td>
                        <td><?php echo $dado["RG"]; ?></td>
                        <td><?php echo $dado["CPF"]; ?></td>
                        <td><?php echo $dado["CNH"]; ?></td>
                        <td><?php echo $dado["Email"]; ?></td>
                        <td><?php echo $dado["Telefone"]; ?></td>
                        <td><?php echo $dado["Celular"]; ?></td>
                        <td><?php echo $dado["Endereco"]; ?></td>
                    </tr>
            <?php  
        endforeach; 
    } else {
        echo "Sem registros";
    }
    } ?>
        </table>
        </section>
    </main>
    <script type="text/javascript" src="Scripts/script.js"></script>
</body>
</html> 