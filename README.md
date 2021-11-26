AppMax | ProductMoviment

- Aplicação:
```sh
Essa aplicação tem como objetivo envolver processos de produtos, por exemplo: cadastro, atualizações e histórico de movimentações.
```
- Tecnologias:
```sh
Php 7.4
Laravel Framework 7.30.5
MySQL 5.7.22
Docker 20.10.10
nginx
```

- Instalação

Criar uma cópia do arquivo .env.example e renomear para .env

Suba os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec teste_appmax bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Gerar as Tabelas e dados do banco:
```sh
php artisan migrate
php artisan db:seed
```

Gerar as rotas da API
```sh
php artisan route:scan
```

Rodar os testes dos endpoints na pasta raíz da API
```sh
./vendor/bin/phpunit
```

- Desenvolvedor oficial
```sh
Pablo Fabrício - fabriciopablo2000@gmail.com
```
