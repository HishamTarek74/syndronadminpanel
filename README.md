# Sheraa
## Site
http://develop.sheraa.net/

### Docker
- run following commands to build docker and run app
```
docker-compose up --build
```
```
docker-compose exec php php artisan migrate:fresh --seed
```
- visit : http://localhost:8000

- for phpmyadmin credentials :
- visit : http://localhost:8001
- - username : your DB_USERNAME in .env file
- - password : your DB_PASSWORD in .env file
- - database name after login : your DB_DATABASE in .env file

``note: all data in db will be keept after down container``
```
docker-compose down
```
## TODO 

