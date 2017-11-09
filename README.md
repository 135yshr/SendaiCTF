# Sendai CTF 2017 Web problem

## How to use
### Start process

```
docker run -p 80:80 -v `pwd`/src:/var/www/html --name php -d php:5.6-apache
docker run --name mysql -e MYSQL_ROOT_PASSWORD=rtquLMJjHhRh -d mysql:5.7
```

### Stop process

```
docker rm -f php
```

