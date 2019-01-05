# lara-api-client


1 - Baixar ou clonar o projeto

2 - fazer uma cópia do arquivo .env.example e renomear para .env (dentro dele, configure os dados do banco de dados) e crie o banco de dados com o mesmo nome

3 - abrir o peojeto do cmd ou outra linha de comando

4 - digitar composer install ou composer update

5 - php artisan key:migrate 

6 - php artisan migrate (para migrar tabelas no banco de dados) 

7 - após concluir, digitar composer require "laravelcollective/html":"^5.4.0"

Em seguida, adicione seu novo provedor à providersmatriz de :config/app.php

  'providers' => [
    // ...
    Collective\Html\HtmlServiceProvider::class,
    // ...
  ],
Por fim, adicione dois aliases de classe à aliasesmatriz de :config/app.php

  'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
    // ...
  ],
  ou clique no link abaixo para pegar a versão mais atualizada:
https://laravelcollective.com/docs/master/html#installation

8 - rodar o projeto

Caso ocorra um problema, verifique a versão do Guzzle no composer.json. Docs disponivel em: http://docs.guzzlephp.org/en/stable/overview.html#installation