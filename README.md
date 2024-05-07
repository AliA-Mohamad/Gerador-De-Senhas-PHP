# Gerador de Senhas

![GitHub repo size](https://img.shields.io/github/repo-size/AliA-Mohamad/Gerador-De-Senhas-PHP?style=for-the-badge)

> Este não é um projeto para ser usado de forma séria. As senhas geradas podem até ser seguras, mas o gerenciador e o verificador não possuem base para usabilidade.

## Ajustes e Melhorias

Para que o projeto possa ser usado, ele precisa:

- [x] Gerar senhas seguras.
- [ ] Ter uma verificação consistente.
- [ ] Ter um processo de hash seguro.
- [ ] Ter uma criptografia segura.

## Pré-requisitos

- PHP 8.0
- Composer

## Instalando

Para adicionar o `Gerador_De_Senhas` no seu projeto:

Windows:
```bash
c:\Raiz_Do_projeto> composer require alia-mohamad/geradordesenhas
```

## Usando <Gerador_De_senhas>

Atualmente na versão `1.0.1` você pode usar 3 classses sendo elas:

1. `Gerador` - possui métodos para criar as senhas.
2. `Gerenciador` - possui métodos para gerar e testar hash das senhas.
3. `Verificador` - possui um método para ver nível de segurança da senha.

### Gerador

> Primeiro você precisa instanciar um `Gerador`. Em seguida, você pode configurar as opções de geração de senha, como o comprimento da senha ou caracteres bloqueados.

```php
require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Gerador;

$gerador = new Gerador();
$gerador->bloquearCaracteres("Aafg!"); // Bloqueia os caracteres "[A,a,f,g,!]"
$senha = $gerador->gerarSenha(16); // Gera uma senha de 16 caracteres

```

- `gerarSenha([número])` -> Gera uma senha de acordo com o numero de caracteres escolhido.
- `bloquearCaracteres([caracteres])` -> Bloqueia que as senhas sejam geradas com os caracteres passados.
- `bloquearNormais()` -> Bloqueia que as senhas sejam geradas com caracteres normais.
- `bloquearNormaisAcentuados()` -> Bloqueia que as senhas sejam geradas com caracteres normais acentuadas.
- `bloquearMaiusculas()` -> Bloqueia que as senhas sejam geradas com caracteres maiúsculos.
- `bloquearMaiusculasAcentuados()` -> Bloqueia que as senhas sejam geradas com caracteres maiúsculos acentuados.
- `bloquearNumerias()` -> Bloqueia que as senhas sejam geradas com caracteres numéricos.
- `bloquearEspecias()` -> Bloqueia que as senhas sejam geradas com caracteres especiais.

## Gerenciador

> Primeiro você precisa instanciar um `Gerenciador` para poder usar seus 2 métodos.

```php
require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Gerenciador;

$senha = "teste";

$gerenciador = new Gerenciador();
$hash = $gerenciador->gerarHashSenha($teste); // Agora eu tenho o hash da senha armazenada na variável.

$verdadeiro = $gerenciador->checarHash($senha, $hash); // A senha corresponde ao hash, retorna verdadeiro.
$falso = $gerenciador->checarHash("teste2", $hash); // A senha não corresponde ao hash, retorna false.

```

- `gerarHashSenha([senha])` -> Gera um hash da senha passada.
- `checarHash([senha], [hash])` -> verifica se a senha corresponde ao hash passado.

## Verificador

> Primeiro se deve instanciar um `Verificador` para poder verificar suas senhas.

```php
require 'vendor/autoload.php';

use AliAMohamad\GeradorDeSenhas\Verificador;

$verificador = new Verificador();
$verificador->verificarForcaDaSenha("teste");  // Retorna uma lista dizendo os critérios que a senha cumpre.

```

- `verificarForcaDaSenha([senha])` -> verifica a força da senha e retorna uma lista com os critérios atendidos.

