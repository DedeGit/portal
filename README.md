# Open News Portal

This is a news portal project built with the Laravel framework. It provides a platform where users can read and share news, with features such as trending articles, categorized content, and an "About" page detailing more information about the project.

## Features

- **Home Page**: Displays the latest and trending news.
- **News Detail Page**: Full details of each news article.
- **About Page**: Information about the project and team.
- **Categories**: Classify news articles by topic.
- **Authentication System**: User registration and login.

## Prerequisites

Make sure you have the following installed before starting:

- PHP >= 8.1
- Composer
- MySQL or another compatible database
 
## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/raphaelvserafim/news-portal.git 
   cd news-portal
   ```
2. Composer
   ```bash
   composer install
   ```
   
3. Configure the ``` .env ``` file.

4. Run migrations to create tables in the database
   ```bash
   php artisan migrate
   ```
5. start the server
    ```bash
    php artisan serve
    ```
   
