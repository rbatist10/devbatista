<?php
// $html = '<h1>Olá Mundo</h1> <h4>subtitulo</h4>';
// echo $html; 

ob_start();
?>
<h1>Olá mundo</h1>
<h4>Subtitulo</h4>

<?php
$html = ob_get_contents();
ob_clean();

require 'vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
// $mpdf->Output('arquivo.pdf', 'F');

// I = abra no browser (padrão)
// D = faça o download forçado
// F = salve no servidor