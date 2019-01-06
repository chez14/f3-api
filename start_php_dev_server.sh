#! /bin/bash

DOCROOT="$(pwd)/public_html/"
ROUTER="$(pwd)/router.php"
HOST=127.0.0.1
PORT=8080

PHP=$(which php)
if [ $? != 0 ] ; then
    echo "Unable to find PHP"
    exit 1
fi
echo "PHP will run on $HOST:$PORT"
echo "with default document served from $DOCROOT"
$PHP -S $HOST:$PORT -t $DOCROOT $ROUTER