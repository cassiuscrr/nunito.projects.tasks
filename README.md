## Tecnologias

Para a elaboração desse projeto foi utilizado o Laravel 8 + Inertia no Backend e o Vue.js + Inertia no front-end. 

## Instalação

Abra o terminal na pasta do projeto e use o comando
```bash
composer install
```

Edite arquivo .env com a base de dados devidamente criada. Substituindo os valores.
Em caso de não possuir o .env copie e renomeie o .env.example para .env

```bash
DB_DATABASE=NOME_DA_BASE
DB_USERNAME=USUARIO
DB_PASSWORD=SENHA
```

Rode o comando migrate
```bash
php artisan migrate
```

Instale as dependências do Client-Serve 
```bash
yarn install
```

## Rodando o Projeto

Pode recompilar a pasta /Public com o comando
```bash
yarn dev
```
ou
```bash
yarn hot
```

