# Usar una imagen base de PHP con Apache
FROM php:8.1-apache

# Copiar el contenido del proyecto al contenedor
COPY . /var/www/html/

# Habilitar módulos de PHP necesarios
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Exponer el puerto 80
EXPOSE 80
