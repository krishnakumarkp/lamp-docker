# lamp-docker

Docker example with Apache, MySql 8.0, PhpMyAdmin and Php7.4

To run these containers using docker commands:

```
docker build -t webserver ./webserver
docker network create -d bridge lamp-network
docker run --name db-server -e MYSQL_ROOT_PASSWORD=12345678 -e MYSQL_DATABASE=myDb -d  -p 3306:3306 --network=lamp-network mysql:8.0
docker run --name phpmyadmin -d --link db-server:db -p 8080:80 --network=lamp-network phpmyadmin/phpmyadmin
docker run --name web-server -d --link db-server -p 80:80 -v $(pwd)/app:/var/www/html --network=lamp-network webserver 
```
To connect to database from mysql client:

```
docker exec -it db-server bash
mysql -u root -p
```

To stop containers and remove containers, networks, volumes, and images created:

```
docker container stop web-server phpmyadmin db-server
docker container rm web-server phpmyadmin db-server
docker network rm lamp-network
docker image rm webserver
```


To run these containers using docker-compose:

```
docker-compose up -d
```

To connect to database from mysql client:

```
docker-compose exec db-server mysql -u root -p
``` 

To stop containers and remove containers, networks, volumes, and images created:

```
docker-compose down -v
```


Open phpmyadmin at [http://localhost:8000](http://localhost:8000)
Open php appp at [http://localhost](http://localhost)



