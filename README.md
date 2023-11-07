<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



# Booking App API

Our application is a platform that facilitates reservations for a wide range of services, including hotels, car rentals, restaurants, and clinics. It provides detailed information about the location, the type of reservation, and the date of the booking.

Additionally, it offers a feature that allows venue owners to either accept or reject reservations. The application also includes an admin control panel, enabling administrators to add, delete, and modify locations based on customer requests, after verifying the authenticity of the place.



## Table of Contents

- [ERD (System Analysis)](#ERD-(System-Analysis))
- [Technology Used](#technology-used)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [API Documentation](#api-documentation)
- [Dashboard Link](#dashboard-link)



## ERD (System Analysis)
* [Link For ERD](https://drive.google.com/file/d/1jEYdIsQl2Qv66BBMU6Q3dFYWF9VNct3Y/view)


## Technology Used
* [laravel 10](https://laravel.com/docs/10.x/releases)

* [laravel-media-library](https://spatie.be/docs/laravel-medialibrary)

* [laravel-query-builder](https://spatie.be/docs/laravel-query-builder)

* [laravel-permission](https://spatie.be/docs/laravel-permission)

* [laravel-markable](https://github.com/maize-tech/laravel-markable)

* [jwt-auth](https://github.com/PHP-Open-Source-Saver/jwt-auth)

* [blurhash](https://github.com/bepsvpt/blurhash)

* [google-translate-php](https://github.com/Stichoza/google-translate-php)

* [telescope](https://laravel.com/docs/10.x/telescope)

## Prerequisites

Before you begin, ensure you have met the following requirements:
- PHP (>= 8.1)
- Composer
- Node.js and npm (for frontend assets)
- A web server (e.g., Apache, Nginx)
- MySQL or another database of your choice


## Installation

1. Clone the repository:
    ```shell script
    git clone https://github.com/MohamadRasoul/Booking_laravel.git
    ```


2. Navigate to the project folder:
    ```shell script
    cd Booking_laravel
    ```

3. Install PHP dependencies using Composer:
    ```shell script
    composer install
    ```


4. Copy the `.env.example` file to `.env`:
    ```shell script
    cp .env.example .env
    ```

5. Generate an application key:
    ```shell script
    php artisan key:generate
    ```

6. Generate secret key for JWT:
    ```shell script
    php artisan jwt:secret
    ```

7. Configure your `.env` file with your database credentials and other settings.

8. Migrate and seed the database:
    ```shell script
    php artisan migrate --seed
    ```

9. Install JavaScript dependencies and compile assets:
    ```shell script
    npm install & npm run dev
    ```


## API Documentation
* [Link to API documentaion.](https://documenter.getpostman.com/view/18748579/2s9YXh4hYK)


## Dashboard Link
[Link to Dashboard.](https://booking.mohamad-rasoul.website/admin)

- **username :** super_admin
- **password :** 12345678


