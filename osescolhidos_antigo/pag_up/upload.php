<?php 
	include "../config/conexao.php";

	if (isset($_POST['enviar'])) {
		
		// dados do array de imagens
		$file = $_FILES['img'];
		$numFile = count(array_filter($file['name']));

		// pasta
		$pasta = "../upload/galeria_imagens";

		// requisitos
		$permissao = array('image/jpeg', 'image/png');
		$maxSize = 1024 * 1024 * 10;

		// mensagens
		$msg = array();
		$errorMsg = array(
			1 => 'Maior do que o limite upload_max_filesize !',
			2 => 'Maior do que o limite max_file_size !',
			3 => 'Feito parcialmente o upload !',
			4 => 'nâo foi feito o upload !'
		);

		if ($numFile <= 0) 
			echo "Selecione uma imagem !";
		else {
			for ($i=0; $i < $numFile; $i++) { 
				# code...
				$name = $file['name'][$i];
				$type = $file['type'][$i];
				$size = $file['size'][$i];
				$error = $file['error'][$i];
				$tmp = $file['tmp_name'][$i];

				$extensao = @end(explode('.', $name));
				$novoNome = 'imagemCompetidores-'.md5(uniqid(rand())).'.'.$extensao;

				if ($error != 0)
					$msg[] = "<b>$name : </b> ".$errorMsg[$error];
				else if (!in_array($type, $permissao))
					$msg[] = "<b>$name : </b> Erro imagem não suportada !";
				else if ($size > $maxSize)
					$msg[] = "<b>$name : </b> Erro imagem ultrapassa o limite de 10MB !";
				else {

					if (move_uploaded_file($tmp, $pasta."/".$novoNome)){
						$msg[] = "<b>$name : </b> Upload realizado com sucesso !";
						$mysqli->query("INSERT INTO galeria_imagens (id, imagem) VALUES ('', '$novoNome')") or die ($mysqli->error);
					}
					else 
						$msg[] = "<b>$name : </b> Desculpe ocorreu um erro ...";

				}
			}

			foreach ($msg as $valor) {
				# code...
				echo $valor."</br>";
			}
			
		}

	}

?>