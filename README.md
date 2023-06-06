
## Installation

Clone this repo

    git clone https://github.com/Bheem-singh-mexoticaita/ecommerceaibot.git

Create env file and set up your DB connection

    cp .env.example .env

Generate key

    php artisan key:generate

Install packages

    composer install

Run migrations without admins/users

    php artisan migrate

Or run migrations with admins/users

    php artisan migrate --seed

admin login details : admin@admin.com
Password : password

## References
- [Laravel 10](https://laravel.com)
- [Laravel Breeze](https://laravel.com/docs/9.x/starter-kits#laravel-breeze)

## Contributing

Anyone who wants to make some improvement just make a Pull-Request.

If you can achieve the same goal using Jetstream, please share your solution with me as I am very interested.

## License

The Laravel framework and this repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).