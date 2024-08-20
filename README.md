# Subscription Platform API

## Overview

This is a RESTful API for a subscription platform built with Laravel. It allows users to subscribe to websites and receive email notifications when new posts are published. The API includes endpoints for creating posts, subscribing users, and sending notifications.

## Features

- **Subscription Management**: Allows users to subscribe to specific websites.
- **Post Management**: Enables creation of posts for websites.
- **Notification System**: Sends email notifications to subscribers when new posts are created.
- **Swagger Documentation**: Interactive API documentation for easy exploration and testing.

## Installation

Follow these steps to get the project up and running on your local machine:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/your-username/subscription-platform-api.git```

2. **Install Dependencies**
    
    Navigate to the project directory and install the necessary dependencies:
    ```bash
    cd subscription-platform
    composer install
    ```

3. **Set Up Environment**
    
    Copy the example environment file and configure it:
    ```bash
    cp .env.example .env
    ```
    Update the .env file with your database and other environment settings.

4. **Generate Application Key**
    
    Generate a new application key for the Laravel application:
    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**
    
    Apply the database migrations to set up the database schema:
    ```bash
    php artisan migrate
    ```

6. **Generate Swagger Documentation**
    
    Generate the Swagger documentation to provide API details:
    ```bash
    php artisan swagger-lume:generate
    ```

7. **Serve the Application**
    
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```
    The application will be accessible at http://localhost:8000.


## API Documentation

The API documentation is available at:

```bash 
http://localhost:8000/api/documentation
```

This Swagger UI will allow you to explore and interact with the API endpoints.
