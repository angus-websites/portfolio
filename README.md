# Portfolio

My personal portfolio, created using Laravel

## Installation

clone the repository from github

```bash
git clone git@github.com:angus-websites/portfolio.git
```

CD into the portfolio directory

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

Run sail

```bash
./vendor/bin/sail up
```

Migrate the database

```bash
./vendor/bin/sail php artisan migrate
```

Seed the database tables

```bash
./vendor/bin/sail php artisan db:seed
```
