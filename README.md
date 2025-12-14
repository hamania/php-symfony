1.0 init api + vue

1.1 swarm stack nginx

1.2 nginx_api_19000 + nginx_vue_80

1.3 nginx_80 (/api)

```
composer require orm
composer require doctrine
composer require symfony/validator

composer require --dev doctrine
composer require --dev doctrine/dbal
composer require --dev orm-fixtures

composer require --dev maker
composer require --dev symfony/maker-bundle 

composer require --dev symfony/browser-kit
composer require --dev symfony/http-client

composer require --dev phpunit/phpunit

bin/console make:entity product
bin/console make:controller Api\\Product

bin/console make:migration
bin/console doctrine:migrations:migrate

# Update schema
php bin/console cache:clear

bin/console doctrine:query:dql "SELECT p FROM App\Entity\Product p"
bin/console doctrine:dbal:run-sql "SELECT * FROM product"

bin/console debug:router

bin/console doctrine:fixtures:load //--purge + re-create
bin/console doctrine:fixtures:load --append

bin/console make:listener Exception kernel.exception


````


* PHPUNIT
```
bin/console doctrine:database:create --env=test
bin/console make:migration
bin/console doctrine:migrations:migrate --env=test

./vendor/bin/phpunit


