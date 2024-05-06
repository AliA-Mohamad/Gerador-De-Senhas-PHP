<?php

namespace AliAMohamad\GeradorDeSenhas;

class Gerenciador
{

    /**
     * @param string $senha Senha para fazer hash.
     * @return string Gera hash de uma senha.
     */
    public function gerarHashSenha($senha) : string
    {
        $hash = password_hash($senha, PASSWORD_BCRYPT);
        return $hash;
    }

    /**
     * @param string $senha Senha a ser checada.
     * @param string $hash Hash da senha passada.
     * @return string Retorno se a senha corresponde ao hash.
     */
    public function checarHash(string $senha, string $hash) : bool
    {
        return password_verify($senha, $hash);

    }
}

?>