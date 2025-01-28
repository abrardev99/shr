# SHR (Shortest) URL Shortener
A simple URL shortener.

## Setup Locally
In terms of local setup, you can use the following requirements:
- PHP 8.2 - with SQLite, GD, and other common extensions.

- If you have these requirements, you can start by cloning the repository and installing the dependencies:

```bash
git clone https://github.com/abrardev99/shr.git

cd shr
```

Next, install the dependencies using [Composer](https://getcomposer.org)

```bash
composer install
```

After that, set up your `.env` file:

```bash
cp .env.example .env

php artisan key:generate
```

Set `APP_URL` in your `.env` file to the URL of your local server.

Project is using `SQLite` so you don't need to spin up DB server. 
Prepare your database and run the migrations:

```bash
touch database/database.sqlite # Mac only, for windows create file manually

php artisan migrate
```

Finally, start the development server:

```bash
php artisan serve
```

## Running Tests

```bash
./vendor/bin/pest
```


