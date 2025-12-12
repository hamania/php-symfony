#!/bin/bash

# docker pull postgres:16
docker run --name localhost_5433 -e POSTGRES_USER=myuser -e POSTGRES_PASSWORD=mypassword -e POSTGRES_DB=mydatabase -p 5433:5432 -d postgres:16
