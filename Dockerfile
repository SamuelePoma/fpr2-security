# Usa l'immagine base ufficiale di PHP con Apache
FROM php:7.4-apache

# Installa le estensioni PHP necessarie
RUN docker-php-ext-install pdo pdo_mysql

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia i file del progetto nella directory di lavoro del container
COPY . /var/www/html

# Imposta i permessi corretti
RUN chown -R www-data:www-data /var/www/html

# Abilita mod_rewrite per Laravel
RUN a2enmod rewrite
