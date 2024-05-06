<?php

require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Gerador;

$gerador = new Gerador();
$gerador->bloquearEspeciais();
$gerador->bloquearMaiusculos();

var_dump($gerador->gerarSenha(200));

?>