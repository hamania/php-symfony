@REM # admin:A7m!Qx2#Lp9Z
@REM # admin:admin

@REM docker stack rm portainer
docker stack deploy -c portainer-stack-no-agent.yml portainer --detach=false
@REM # docker stack ps portainer

