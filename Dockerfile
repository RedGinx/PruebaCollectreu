# Usar una imagen base con PHP y Apache
FROM php:8.2-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Copiar el contenido de tu proyecto Laravel al contenedor
COPY . /var/www/html

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependencias de Composer
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto 80
EXPOSE 80
