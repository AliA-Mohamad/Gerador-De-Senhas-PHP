<?php

namespace AliAMohamad\GeradorDeSenhas;

class Verificador
{
    private function verificarLetrasMinusculas(string $senha) : bool
    {
        return preg_match('/[a-z]/', $senha) === 1;
    }

    private function verificarLetrasMinusculasAcentoadas(string $senha): bool
    {
        return preg_match('/[áàâãéèêíïóôõöúçñ]/i', $senha) === 1;
    }

    private function verificarLetrasMaiusculas(string $senha) : bool
    {
        return preg_match('/[A-Z]/', $senha) === 1;
    }

    public function verificarLetrasMaiusculasAcentoadas(string $senha) : bool
    {
        return preg_match('/[ÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]/', $senha) === 1;
    }

    private function verificarNumeros(string $senha) : bool
    {
        return preg_match('/[0-9]/', $senha) === 1;
    }

    private function verificarCaracteresEspeciais(string $senha) : bool
    {
        return preg_match('/[!@#$%&*\-_=:+,.\|?~^`\'\"{}[\]()]/', $senha) === 1;
    }

    public function verificarTamanhoDaSenha(string $senha) : bool
    {
        return strlen($senha) >= 12;
    }


    public function verificarForCaDaSenha(string $senha) : array
    {
        $criterios = [
            'tamanho' => $this->verificarTamanhoDaSenha($senha),
            'caracterNormal' => $this->verificarLetrasMinusculas($senha),
            'caracterNormalAcentoado' => $this->verificarLetrasMinusculasAcentoadas($senha),
            'caracterMaiusculu'=> $this->verificarLetrasMaiusculas($senha),
            'caracterMaiusculuAcentoado' => $this->verificarLetrasMinusculasAcentoadas($senha),
            'caracterNumerico' => $this->verificarNumeros($senha),
            'caracterEspecial' => $this->verificarCaracteresEspeciais($senha)
        ];

        $pontuacao = 0;
        foreach($criterios as $criterio)
        {
            if($criterio)
            $pontuacao++;
        }

        switch ($pontuacao) {
            case ($pontuacao >= 0 && $pontuacao <= 2):
                $forca = "fraca";
                break;
            case ($pontuacao >= 3 && $pontuacao <= 4):
                $forca = "média";
                break;
            case ($pontuacao >= 5 && $pontuacao <= 6):
                $forca = "boa";
                break;
            case ($pontuacao == 7):
                $forca = "excelente";
                break;
            default:
                $forca = "desconhecida";
        }
    
        $criterios['força'] = $forca;
        
        return $criterios;
    }
}

?>