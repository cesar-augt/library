# Library

This is a Yii2 project to manage books of library.

## Prerequisites

Before you begin, ensure you have the following requirements installed:

- [PHP](https://www.php.net/) (>= 8.1)
- [Composer](https://getcomposer.org/)
- [Yii2](https://www.yiiframework.com/)

## Getting Started

Follow these steps to get the project up and running:

1. Clone the repository:

    ```bash
    git clone https://github.com/cesar-augt/app-library
    ```

2. Change into the project directory:

    ```bash
    cd library
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Configure the database:

    - Create a new database for the project.
    - Update the database connection settings in the file config/db.php.

5. Apply migrations:

    ```bash
    yii migrate
    ```

    This command will create the necessary tables in your configured database.

6. Start the development server:

    ```bash
    yii serve
    ```

    Access the application at [http://localhost:8080](http://localhost:8080).

## Directory Structure

- `config/` - Configuration files
- `controllers/` - Controller classes
- `migrations/` - Database migration files
- `models/` - Model classes
- `runtime/` - Runtime files
- `views/` - View files
- `web/` - Web assets and entry scripts