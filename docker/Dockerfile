# Usamos la imagen base de PHP con Apache
FROM php:8.1-apache

# Establecemos el directorio de trabajo en /var/www/html
WORKDIR /var/www/html

# Actualizamos el índice de paquetes y luego instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo_mysql

# Copiamos los archivos de la aplicación a la imagen del contenedor
COPY . /var/www/html

# Instalamos las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos las dependencias de Laravel
# RUN composer install --no-scripts --no-autoloader

# Generamos el archivo autoload de Composer
RUN composer dump-autoload

# Copiamos el archivo de configuración de Apache
COPY ./docker/apache2.conf /etc/apache2/sites-available/000-default.conf

# Habilitamos el módulo de reescritura de Apache
RUN a2enmod rewrite

# Exponemos el puerto 80 para acceder a la aplicación web
EXPOSE 80

RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev

# Instalamos las dependencias de MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN pecl config-set php_ini /etc/php.ini

# Ejecutamos el servidor Apache en primer plano
CMD ["apache2-foreground"]
