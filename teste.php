<?php

require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Gerador;
use AliAMohamad\GeradorDeSenhas\Gerenciador;
use AliAMohamad\GeradorDeSenhas\Verificador;


$gerador = new Gerador();
$senha = $gerador->gerarSenha(16);

var_dump($senha);

$gerenciador = new Gerenciador();
$hash = $gerenciador->gerarHashSenha($senha);

var_dump($hash);

var_dump($gerenciador->checarHash($senha, $hash));

$verificador = new Verificador();
var_dump($verificador->verificarForCaDaSenha($senha));

?>