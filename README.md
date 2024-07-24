## Laravel Blog API Documentation

## Table of Contents

-   Introduction
-   Requirements
-   Installation
-   Configuration
-   Database Migrations and Seeding
-   [Using Postman]

## Introduction

This documentation provides a comprehensive guide to setting up and using the Laravel Blog API. The API allows you to manage blogs, posts, likes, and comments with secure access using a custom token middleware.

## Requirements

-   PHP 8.1 or higher
-   Laravel 10 or higher
-   Composer
-   MySQL or another supported database

## Installation

### Clone the repository:

Bash


git clone <repository_url>
cd <repository_directory>




## Configuration

1.  *Install dependencies:*
    
    Bash
    
    
    composer install
    
    
    
2.  *Generate an application key (Important Step):*
    
    Bash
    
    
    php artisan key:generate
    
    

    
    *Explanation:*
    
    The php artisan key:generate command creates a random application key, which is a crucial security measure in Laravel applications. This key is used for encryption, decryption, and other security-related tasks within the framework.
    
3.  *Configure database connection:*
    
    Update the .env file with your database credentials (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
    

## Database Migrations and Seeding

1.  *Migrate database tables:*
    
    Bash
    
    
    php artisan migrate
    
    
    

    
2.  *Seed initial data (optional):*
    
    Bash
    
    
    php artisan db:seed
    
    


## Using Postman (*New Section*)

You can then use all the endpoints on the postman url
https://documenter.getpostman.com/view/27307949/2sA3kXEfmR
