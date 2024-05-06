<?php

namespace AliAMohamad\GeradorDeSenhas;

class Gerador
{
    private $caracteresNormais = "abcdefghijklmnopqrstuvwxyz";
    private $caracteresMaiusculos = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $caracteresNumericos = "0123456789";
    private $caracteresEspeciais = "!@#$%&*-_=:+,./\|?~^`'\"{}[]()";

    private $caracteresBloqueados = array();
    
    public function bloquearNormais() : void
    {
        $this->bloquearCaracteres($this->caracteresNormais);
    }
    
    public function bloquearMaiusculos() : void
    {
        $this->bloquearCaracteres($this->caracteresMaiusculos);
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
        $stringCaracteresPermitidos = 
            $this->caracteresNormais . 
            $this->caracteresMaiusculos . 
            $this->caracteresNumericos . 
            $this->caracteresEspeciais;
        
        $caracteresPermitidos = str_split($stringCaracteresPermitidos);
        $caracteresPermitidos = array_diff($caracteresPermitidos, $this->caracteresBloqueados);
        $caracteresPermitidos = array_values($caracteresPermitidos);
        $totalCaracteresPermitidos = count($caracteresPermitidos);
        
        $senha = '';
        $caractereAnterior = null;
        for ($i = 0; $i < $tamanho; $i++) {
            do
            {
                $caractereAleatorio = $caracteresPermitidos[random_int(0, $totalCaracteresPermitidos - 1)];
            }
            while($caractereAleatorio == $caractereAnterior);

            $senha .= $caractereAleatorio;
            $caractereAnterior = $caractereAleatorio;
        }
        
        return $senha;
    }
}

?>