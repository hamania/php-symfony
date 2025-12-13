docker
hamania@gmail.com

docker info | findstr swarm

docker swarm init
Swarm initialized: current node (kxn1tirr0vul7bgv9riin4c9e) is now a manager.
To add a worker to this swarm, run the following command:
PC
    docker swarm join --token SWMTKN-1-20irqze9axlsa6fdbhmeu36anfgc3uit4cqwf3949qd1txzbn3-3hrs8hamhepc13g8iid3k4fqa 192.168.65.3:2377
	
	docker swarm init
Swarm initialized: current node (k23bpsg4ipridge8s210ypkuv) is now a manager.



Mac 
    docker swarm join --token SWMTKN-1-3jcvcxli9x1ojc9kgl0qo62a6tmfyde3iuzcplwodl9zj5ytkd-b8dhn90567lhggk4c9lvgfqdm 192.168.65.3:2377

To add a worker to this swarm, run the following command:

    docker swarm join --token
	
	
To add a manager to this swarm, run 'docker swarm join-token manager' and follow the instructions.
To add a manager to this swarm, run the following command:

    docker swarm join --token SWMTKN-1-6bgvtpu65yss03gzt1o01bhep13j8nnrm851o3hgd36b4kjaq4-52dsosewslbihnbj2plqrb7ep 192.168.65.3:2377
	
	
docker network create --driver overlay portainer_net
fev1v272w3qd2w2hfuduef6gg

notepad++ portainer-stack.yml

docker stack deploy -c .\portainer-stack.yml portainer
Since --detach=false was not specified, tasks will be created in the background.
In a future release, --detach=false will become the default.
Creating network portainer_default
Creating service portainer_portainer
Creating service portainer_agent


docker run -it --rm php:8.4-fpm sh

docker exec -it $cid sh