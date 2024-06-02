# Use a imagem oficial do PHP 8.2 FPM como base
FROM php:8.2-fpm

# Instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    nginx \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql zip

# Configuração do Nginx
COPY nginx.conf /etc/nginx/sites-available/default

# Copie o arquivo de configuração do PHP
#COPY php.ini /usr/local/etc/php/

COPY ./ /var/www/html

# Altere o proprietário do diretório html para www-data
RUN chown -R 33:1000 /var/www/html
RUN chmod -R 777 /var/www/html/storage

# Defina o diretório de trabalho
WORKDIR /var/www/html


# Exponha as portas
EXPOSE 80 443

# Inicie o Nginx e o PHP-FPM
CMD service nginx start && php-fpm
