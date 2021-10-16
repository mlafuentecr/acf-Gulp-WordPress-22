# Wordpress_Docker_2021

<br/>for Mac or Windows, Compose comes pre-installed:

1. mkdir > docker-client_name this name will be on docker container
2. docker-client_name > touch docker-compose.yml
3. docker-client_name > docker-compose up -d
4. inside of the them folder run npm install
5. run gulp to compile all the bundles

```
-Inside of theme folder run gulp
-If you need to increase  Max upload filesize you can modify .htcaccess
```

```
for your local docker
version: '3.9'

services:
  ### db ###################################################
  db:
    image: mysql:5.7
    container_name: db
    volumes:
      - ./mysql:/var/lib/mysql
    restart: always
    environment:
      MYSQL_DATABASE: devoddsa_wp_uhlwb
      MYSQL_ROOT_PASSWORD: wordpress1 #user root pass wordpress1
      MYSQL_USER: devoddsa_wp_u1mxf #user admin pass wordpress2
      MYSQL_PASSWORD: LCZst?40E1~7XFhh
    networks:
      - overlay
  ## phpMyAdmin ###########################################
  phpmyadmin:
    container_name: phpmyadmin
    depends_on:
      - db
    image: phpmyadmin:latest
    restart: always
    ports:
      - '8080:80'
    environment:
      PMA_HOST: db
      MYSQL_ROOT_PASSWORD: wordpress1
    networks:
      - overlay
  ## Wordpress ########################################### ./:/var/www/html
  wordpress:
    depends_on:
      - db
    image: wordpress:latest
    ports:
      - '8000:80'
    restart: always
    volumes:
      - ./src/themes:/var/www/html/wp-content/themes
      - ./src/themes:/var/www/html/wp-content/plugins
      - ./src/themes:/var/www/html/wp-content/uploads
    #volumes:
    #  - C:/xampp2/htdocs/wp/client:/var/www/html
    container_name: wp
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_NAME: devoddsa_wp_uhlwb
      WORDPRESS_DB_USER: devoddsa_wp_u1mxf
      WORDPRESS_DB_PASSWORD: LCZst?40E1~7XFhh
    networks:
      - overlay
volumes:
  db_data: {}

networks:
  overlay:

```

```

# To Tear Down
$ docker-compose down
```
