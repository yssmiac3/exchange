composer install
npm install
npm run dev
composer dump-autoload
php artisan migrate
php artisan db:seed

Users:

    -admin
        email: admin@exchange.com
        password: secret
        
    -client
        mail: admin@exchange.com
        password: secret
        
Client John Doe has 1000 EUR and able to exchange them on exchange tab.
Admin Yehor Hnedash has 0 EUR, and not allowed to exchange. Admin is able to see history on history tab.
