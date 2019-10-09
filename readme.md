##Symfony REST app


`php ./bin/console doctrine:database:create`
za proveru da li baza postoji

`php ./bin/console make:migration`
za kreiranje migracije na osnovu entiteta

`php bin/console doctrine:migrations:migrate`
za konacnu migraciju

 `php bin/console server:start`
 startovanje servera [https://symfony.com/doc/current/setup/built_in_web_server.html]

 start api browser: [http://127.0.0.1:8000/api]