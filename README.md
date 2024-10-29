
# GESUAS - Assistência Socail

Desenvolvido com o intuito de criar uma plataforma acessível para cadastro e busca cidadãos beneficente utilizando o framework Symfony. 

Os Testes Unitários foram desenvolvidos e executados com PHPUnit.

## Requisitos

Você precisará ter instalado em sua máquina o [Docker](https://www.docker.com) e o [Composer](https://getcomposer.org).

## Tecnologias Utilizadas no projeto

HTML, CSS, PHP, Symfony, PHPUnit, Docker, Composer

## Referências

 - [PHP](https://www.php.net)
 - [PHPUnit](https://phpunit.de)
 - [Docker](https://www.docker.com)
 - [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
 - [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
 - [Symfony](https://symfony.com)
 - [Composer](https://getcomposer.org)
 
 
## Instalação

Para instalar e executar o projeto, siga os seguintes passos:

Clonar o repositório:
```bash
git clone https://github.com/Barionix/gesuas-project.git
```

Acesse a pasta do projeto
```bash
cd gesuas-project
```

Execute o build e inicialize o container
```bash
docker-compose up --build
```

Ainda que o container esteja rodando, a aplicação não funcionará e uma mensagem de erro será exibida ao acessá-la pela URL, pois faz-se necessário instalar as dependências do projeto utilizando o Composer. Assim, abra um novo terminal e execute a instalação dos pacotes necessários
```bash
cd gesuas
composer install
```

Após isso o sistema estará rodando e funcionando na sua máquina em http://localhost:8741/ ou na porta indicada pelo Docker.
## Testes Unitários

Para a realização dos Testes Unitários, siga os seguintes passos:

Acesse a pasta do projeto
```bash
cd gesuas
```

Execute o comando para execução dos Testes com o PHPUnit
```bash
php bin/phpunit
```



## Autor

- [@Barionix](https://www.github.com/Barionix)


