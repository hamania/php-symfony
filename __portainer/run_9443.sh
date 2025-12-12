#!/bin/bash

# admin:A7m!Qx2#Lp9Z
# admin:admin

# docker stack rm portainer
docker stack deploy -c portainer-stack-with-agent.yml portainer 
docker stack ps portainer

