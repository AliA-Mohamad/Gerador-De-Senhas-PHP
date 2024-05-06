<?php

namespace AliAMohamad\GeradorDeSenhas;

class Gerador
{
    private $caracteresNormais = "abcdefghijklmnopqrstuvwxyz";
    private $caracteresNormaisAcentoados = "áàâãéèêíïóôõöúçñ";
    private $caracteresMaiusculos = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $caracteresMaiusculosAcentoados = "ÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ";
    private $caracteresNumericos = "0123456789";
    private $caracteresEspeciais = "!@#$%&*-_=:+,./\|?~^`'\"{}[]()";

    private $caracteresBloqueados = array();
    
    public function bloquearNormais() : void
    {
        $this->bloquearCaracteres($this->caracteresNormais);
    }
    
    public function bloquearNormaisAcentoados() : void
    {
        $this->bloquearCaracteres($this->caracteresNormaisAcentoados);
    }

    public function bloquearMaiusculos() : void
    {
        $this->bloquearCaracteres($this->caracteresMaiusculos);
    }

    public function bloquearMaiusculosAcentoados() : void
    {
        $this->bloquearCaracteres($this->caracteresMaiusculosAcentoados);
    }
    
    public function bloquearNumericos() : void
    {
        $this->bloquearCaracteres($this->caracteresNumericos);
    }
    
    public function bloquearEspeciais() : void
    {
        $this->bloquearCaracteres($this->caracteresEspeciais);
    }

    /**
     * @param string $caracteresBloqueados Caracteres a serem bloqueados. 
    */ 
    public function bloquearCaracteres(string $caracteresBloqueados) : void
    {   
        $novaLista = array_merge($this->caracteresBloqueados, str_split($caracteresBloqueados));
        $this->caracteresBloqueados = array_unique($novaLista);
    }
    
     /**
      * @param int $tamanho Numero de caracteres presentes na senha. 
      * @return string Gera uma senha.
     */
    public function gerarSenha(int $tamanho) : string
    {
        $senha = '';
        $tiposCaracteres = [
            $this->caracteresNormais,
            $this->caracteresNormaisAcentoados,
            $this->caracteresMaiusculos,
            $this->caracteresMaiusculosAcentoados,
            $this->caracteresNumericos,
            $this->caracteresEspeciais
        ];

        foreach ($tiposCaracteres as $tipoCaractere) {
            $senha .= $tipoCaractere[random_int(0, strlen($tipoCaractere) - 1)];
        }

        $stringCaracteresPermitidos = implode('', $tiposCaracteres);
        $caracteresPermitidos = str_split($stringCaracteresPermitidos);
        $senha = implode(array_diff(str_split($senha), $this->caracteresBloqueados));
        $caracteresPermitidos = array_diff($caracteresPermitidos, $this->caracteresBloqueados);
        $caracteresPermitidos = array_values($caracteresPermitidos);
        $totalCaracteresPermitidos = count($caracteresPermitidos);

        for ($i = strlen($senha); $i < $tamanho; $i++) {
            $senha .= $caracteresPermitidos[random_int(0, $totalCaracteresPermitidos - 1)];
        }

        return str_shuffle($senha);
    }
}

?>