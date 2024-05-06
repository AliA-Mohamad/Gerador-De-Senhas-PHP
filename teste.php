<?php

require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Gerador;

$gerador = new Gerador();
$gerador->bloquearMaiusculos();
$gerador->bloquearEspeciais();
$gerador->bloquearNumericos();

var_dump($gerador->gerarSenha(200));
?>