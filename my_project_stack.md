docker build -t my_project_api:1.0 ./my_project_api
@REM docker run -p 8001:8000 my_project_api:1.0

docker build -t my_project_vue:1.0 ./my_project_vue
@REM docker run -p 8080:80 my_vue_project:1.0

docker stack deploy -c my_project_stack.yml my_project
