### Installation guide

1. copy .env.example to .env
2. modify database credentials
3. run `php artisan migrate`
4. run factory from tinker to generate random data

    `php artisan tinker`    
    `Sale::factory()->count(500)->create()`
