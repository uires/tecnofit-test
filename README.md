<h1 align="center">Tecnofit</h1>
<p align="center">Uma aplicação laravel para retornar o rank por movimento, conforme posições dos usuários</p>

<h3 align="center">
  <a href="https://img.shields.io/badge/author-uires-brightgreen" target="_blank">
    <img alt="Author: uires" src="https://img.shields.io/badge/author-uires-brightgreen" />
  </a>
  <a href="#" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>

</h3>

<br />


## Depedências 

Você vai precisar: 
- Composer 2.x instalado
- PHP 8.x instalado
- MariaDB 10.6 instalado ou MySQL semelhante
- Um banco de dados definido no .env
- Um banco de dados para teste de integração definido no .env.testing

## Para rodar a aplicação

```sh
composer install

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve
```

## Para rodar os testes

```sh
php artisan test
```

<br />

## 🔧 Uso

Após roda, você pode importar no seu postman a [coleção de exemplo](https://github.com/uires/tecnofit-test/blob/main/Tecnofit.postman_collection.json) 


<br />

## 💻 Tecnologias

- PHP 8.1.6
- Laravel 9.19
- MariaDB 10.6
