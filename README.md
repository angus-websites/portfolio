# Portfolio

My personal portfolio, created using Laravel

## Installation

clone the repository from github

```bash
git clone git@github.com:angus-websites/portfolio.git
```

CD into the portfolio directory

### Setup for dev (sail)

if you are developing on another dev machine and plan to use SAIL you can execute the following commands to use docker to install dependencies...

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
more information about this command can be found [here](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects)

**Make sure you create an ENV file or simple copy the example one provided and put the contents in .env and create a database password etc**

Run sail

```bash
./vendor/bin/sail up
```

then install the modules
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

Generate an app encryption key

```bash
./vendor/bin/sail php artisan key:generate
```

Migrate the database

```bash
./vendor/bin/sail php artisan migrate
```

Seed the database tables

```bash
./vendor/bin/sail php artisan db:seed
```


### Setup for Production server

Ensure you have the right requirements on your server / computer to run Laravel, if not you can install them (ubuntu)

```bash
sudo apt install php libapache2-mod-php php-mbstring php-cli php-bcmath php-json php-xml php-zip php-pdo php-common php-tokenizer php-mysql
```
 
Next ensure you have composer installed, if not you can run the following commands...

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar  /usr/local/bin/composer
sudo chmod +x   /usr/local/bin/composer
```

Install dependencies using composer

```bash
composer install
```

Install NPM dependencies

if you do not have NPM installed on your machine execute the following (ubuntu)

```bash
sudo apt-get install nodejs npm
```

then install the modules
```bash
npm install
npm run dev
```

**Make sure you create an ENV file or simple copy the example one provided and put the contents in .env and create a database password etc**

Generate an app encryption key

```bash
php artisan key:generate
```

Migrate the database

```bash
php artisan migrate
```

Seed the database tables

```bash
php artisan db:seed
```
