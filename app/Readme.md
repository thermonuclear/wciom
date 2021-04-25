## wcioml.dev 
тестовое задание.<br>
 
Использованы: php 7.4, mysql 8, codeception, phinx, kohana, docker

Настроена среда разработки на докер, папка docker<br>
поднятие докер в папке docker: docker-compose up -d<br>
В app создать папку application/logs и application/cache. Убедиться, что для них разрешена запись.

Вход в контейнер php-fpm:

    docker-compose exec php-fpm /bin/bash
В контейнере php-fpm выполнить

    composer install
phpmyadmin после поднятия докера доступен по http://localhost:8080/ <br>
mysql: user root pass root<br>

## миграции
Для создания таблицы войти в контейнере php-fpm в папку /var/www/app и выполнить:

    php vendor/bin/phinx migrate
## автотесты
папка app/application/tests. Для запуска тестов войти в контейнере php-fpm в папку /var/www/app и выполнить:

    php vendor/bin/codecept run
Запус автотестов наполнит таблицу с телефонами. 

Если нужен дамп бд с данными, то пример в файле mysql_dump.sql. Если первоначальное заполнение проводить через него, 
то сперва требуется использовать его, а потом уже запускать автотесты, миграция в этом случае не требуется.<br> 
А можно просто выполнить миграцию, и автотесты и бд также заполнится.
Написанный код содержится папках:

    app/application/classes
    app/application/migrations
    app/application/views
