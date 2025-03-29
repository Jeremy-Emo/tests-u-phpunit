Lancer le projet :

```sh
docker compose up -d
docker exec -it php_tests composer install
```

Lancer PHPUnit :
```sh
docker exec -it php_tests vendor/bin/phpunit
```

Lancer PHPUnit avec coverage :
```sh
docker exec -it php_tests vendor/bin/phpunit --coverage-html coverage/
```