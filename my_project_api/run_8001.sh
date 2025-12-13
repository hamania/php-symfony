#!/bin/bash

# local
# export DATABASE_URL="postgresql://myuser:mypassword@localhost:5433/mydatabase?serverVersion=16&charset=utf8"

# php bin/console doctrine:database:create
# php bin/console doctrine:migrations:migrate

# brew install php@8.4
# brew install composer
# brew install symfony

symfony server:start --port=8001 --allow-all-ip 