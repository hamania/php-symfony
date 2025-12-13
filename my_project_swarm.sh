#!/bin/bash

export MY_PROJECT_TITLE="my_project"
export MY_PROJECT_VERSION="1.2"
echo $MY_PROJECT_TITLE: $MY_PROJECT_VERSION

# exit

docker build -t my_project_api:$MY_PROJECT_VERSION ./my_project_api
# docker run -p 8001:8000 my_project_api:$MY_PROJECT_VERSION

docker build -t my_project_vue:$MY_PROJECT_VERSION ./my_project_vue
# docker run -p 8080:80 my_vue_project:$MY_PROJECT_VERSION

#  --env-file .env
# MY_PROJECT_VERSION=$MY_PROJECT_VERSION 
docker stack rm $MY_PROJECT_TITLE && docker stack ps $MY_PROJECT_TITLE


# MY_PROJECT_VERSION=$MY_PROJECT_VERSION 
docker stack deploy -c my_project_swarm.yml $MY_PROJECT_TITLE && docker stack ps $MY_PROJECT_TITLE

docker stack ps $MY_PROJECT_TITLE

exit 0

# Run database migrations
export DATABASE_URL="postgresql://myuser:mypassword@localhost:5433/mydatabase?serverVersion=16&charset=utf8"
docker run --rm \
  --network mynet \
  -e DATABASE_URL=$DATABASE_URL \
  my_project_api:${MY_PROJECT_VERSION} \
  php bin/console doctrine:migrations:migrate --no-interaction