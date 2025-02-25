FROM php:8.2-apache
RUN apt-get update && apt-get install -y mariadb-client && docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql
COPY app/ /var/www/html/
EXPOSE 80
ENV DB_HOST mariadb
ENV DB_USER guesbook
ENV DB_PASSWORD guesbook
ENV DB_NAME guesbook
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh