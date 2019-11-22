<?php
session_start();
require './config.php';

	// Definimos o nome do arquivo que será exportado
	$arquivo = 'os-escolhidos.xls';

	// Criamos uma tabela HTML com o formato da planilha
	$html = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$html .= '<table border="1">';
	$html .= '<tr>';
	$html .= '<td colspan="7" align="center">Os Escolhidos - Edição Especial</tr>';
	$html .= '</tr>';

	$html .= '<tr>';
	$html .= '<td><b>ID</b></td>';
	$html .= '<td><b>Casal</b></td>';
	$html .= '<td><b>Cavalheiro</b></td>';
	$html .= '<td><b>Tel Cavalheiro</b></td>';
	$html .= '<td><b>Dama</b></td>';
	$html .= '<td><b>Tel Dama</b></td>';
	$html .= '<td><b>Pago</b></td>';
	$html .= '</tr>';

	$sql = "SELECT id, casal, cavalheiro, cel_c, dama, cel_d, pago FROM competidores ORDER BY id";
	$sql = $db->prepare($sql);
	$sql->execute();

	if($sql->rowCount() > 0) {
		foreach ($sql->fetchAll() as $competidores) {
			$html .='<tr>';
			$html .='<td>'.$competidores['id'].'</td>';
			$html .='<td>'.$competidores['casal'].'</td>';
			$html .='<td>'.$competidores['cavalheiro'].'</td>';
			$html .='<td>'.$competidores['cel_c'].'</td>';
			$html .='<td>'.$competidores['dama'].'</td>';
			$html .='<td>'.$competidores['cel_d'].'</td>';
			if($competidores['pago'] == '1') {
				$html .='<td>Sim</td>';
			} else {
				$html .='<td>Não</td>';
			}
			// $data = date('d/m/Y H:i:s',strtotime($competidores['created']));
			$html .='</tr>';
		}
	}

	header('Content-Type: text/html; charset=utf-8');
	header ("Expires: Mon, 26 Jul 2019 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
	header ("Content-Description: PHP Generated Data" );

	echo $html;
	exit;

?>