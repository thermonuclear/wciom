# Базовый образ с mysql
FROM mysql:8


# COPY ./mysql/conf/my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod -R 0444 /etc/mysql/conf.d/
