#!/bin/sh

./dev.sh down && ./dev.sh up --build -d && ./dev.sh exec api composer update && ./dev.sh exec api php artisan migrate