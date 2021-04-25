документация codeception

    https://codeception.com/docs/

установка codeception в проекте

    composer install
Создание unit теста:

    php vendor/bin/codecept generate:test unit Example
Справочник unit методов:

    https://phpunit.readthedocs.io/ru/latest/assertions.html
Создание acceptance теста:

    php vendor/bin/codecept g:cest acceptance Example
Создание api теста:

    php vendor/bin/codecept g:cest api Example
запуск всех тестов из корня проекта

    php vendor/bin/codecept run
запуск только unit тестов

    php vendor/bin/codecept run unit
Подробнее о запуске тестов:

    https://codeception.com/docs/reference/Commands#Run
 
Для изменения конфигов локально копируем соответствующий конфиг в файл без суффикса dist
 и вносим в нем изменения. Например, codeception.dist.yml в codeception.yml или unit.suite.dist.yml в unit.suite.yml. Такие файлы добавлены в .gitignore
  и не будут попадать в коммит. Документация:

    https://codeception.com/docs/reference/Configuration#Config-Templates-dist 
