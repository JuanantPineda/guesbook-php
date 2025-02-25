FROM docker.io/mariadb:10.5
COPY schema.sql /docker-entrypoint-initdb.d/
ENV MARIADB_DATABASE= guesbook
ENV MARIADB_ROOT_PASSWORD= root
ENV MARIADB_USER= guesbook
ENV MARIADB_PASSWORD= guesbook