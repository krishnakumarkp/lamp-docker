# lamp-docker

Docker example with Apache, MySql 8.0, PhpMyAdmin and Php7.4

To run these containers using docker commands:

```
cd ./weserver
docker build -t webserver .
docker run --name db-server -e MYSQL_ROOT_PASSWORD=12345678 -d  -p 3306:3306 mysql:latest
docker run --name phpmyadmin -d --link db-server:db -p 8080:80 phpmyadmin/phpmyadmin
docker run --name web-server -d --link db-server -p 80:80 -v $(pwd)/app:/var/www/html webserver 
```
To connect to database from mysql client:

```
docker exec -it db-server bash
mysql -u root -p
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



