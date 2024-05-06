<?php

require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Gerador;
use AliAMohamad\GeradorDeSenhas\Gerenciador;


$gerador = new Gerador();
$senha = $gerador->gerarSenha(8);

var_dump($senha);

$gerenciador = new Gerenciador();
$hash = $gerenciador->gerarHashSenha($senha);

var_dump($hash);

var_dump($gerenciador->checarHash($senha, $hash));
?>