#!/bin/bash
while true
do
	# php /var/www/html/relaypi/index.php waktu cekwaktu
	php /var/www/html/relaypi/index.php waktu daemon
	# echo "Press [CTRL+C] to stop.."
	sleep 1
done