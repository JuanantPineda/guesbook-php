#!/bin/bash
while ! mysql -u ${DB_USER} -p${DB_PASSWORD} -h ${DB_HOST}  -e ";" ; do
	sleep 1
done

apache2ctl -D FOREGROUND