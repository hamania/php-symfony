1.0 init api + vue

1.1 swarm stack nginx

1.2 nginx_api_19000 + nginx_vue_80

1.3 nginx_80 (/api)

```
composer require orm

composer require --dev maker
composer require --dev symfony/maker-bundle 
composer require --dev orm-fixtures
composer require --dev doctrine
composer require --dev doctrine/dbal

composer require --dev phpunit/phpunit
composer require --dev symfony/browser-kit
composer require --dev symfony/http-client

bin/console make:entity product
bin/console make:controller Api\\Product

bin/console make:migration
bin/console doctrine:migrations:migrate

bin/console doctrine:query:dql "SELECT p FROM App\Entity\Product p"
bin/console doctrine:dbal:run-sql "SELECT * FROM product"

bin/console debug:router

bin/console doctrine:database:create --env=test
bin/console make:migration
bin/console doctrine:migrations:migrate --env=test

./vendor/bin/phpunit

bin/console doctrine:fixtures:load //--purge + re-create
bin/console doctrine:fixtures:load --append

