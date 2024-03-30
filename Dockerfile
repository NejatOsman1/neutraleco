# Use the official PHP image with Apache as the base
FROM php:8.2-apache
# Your additional Dockerfile commands here

# Install system dependencies for PHP extensions
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libmagickwand-dev \
    unzip \
    git \ 
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install xml \
    && docker-php-ext-install ctype \    
    && docker-php-ext-install intl \
    && docker-php-ext-install opcache \
    && docker-php-ext-install zip \
    && pecl install imagick && docker-php-ext-enable imagick

# Allow Composer to run as superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Enable Apache mod_rewrite
RUN a2enmod rewrite
RUN a2enmod ssl
# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf


# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the application code to the container
COPY . .


# Update Symfony Flex
RUN composer update --no-plugins --no-scripts

# Install the PHP dependencies with Composer
# Note: Ensure your project's composer.json & composer.lock are copied to the container
RUN rm -rf var/cache/* # Add this line before composer install to clear cache
RUN composer install --no-interaction --optimize-autoloader

# Change ownership of the application files (Adjust www-data according to your web server user)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to access the Apache server
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]