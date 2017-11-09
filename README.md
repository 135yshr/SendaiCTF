# Sendai CTF 2017 Web problem

## How to use
### Start process

```
docker run -p 80:80 -v `pwd`/src:/var/www/html --name php -d php:5.6-apache
```

### Stop process

```
docker rm -f php
```

