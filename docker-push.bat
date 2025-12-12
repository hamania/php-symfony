docker build -t myregistry/symfony-php:latest .
docker build -t myregistry/vue-frontend:latest ./frontend
docker push myregistry/symfony-php:latest
docker push myregistry/vue-frontend:latest
