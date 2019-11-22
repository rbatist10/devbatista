<?php

require 'namespace/sobre1.php';
require 'namespace/sobre2.php';

$sobre = new \aplicacao\v2\Sobre();

echo "Versão: ".$sobre->getVersao();

?>