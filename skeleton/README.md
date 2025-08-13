# [Project Title]

A brief and clear description of the project, its purpose, and the problem it solves.

## Technologies Used

- **PHP 8.3**
- **Laravel 11**
- **Composer 2.7**
- **Nginx**
- **Supervisor**
- **Docker**
- **AWS ECR**
- **AWS Fargate**
- **CI/CD**

## Architecture and Code Flow

This project is containerized using Docker, running PHP 8.3, Nginx, and Supervisor in a single PHP-FPM-8.3 image.

### CI/CD

The project is configured with two pipelines:
- **Build**: Builds the Docker image and pushes it to the AWS ECR repository.
- **Deploy**: Deploys the image to a serverless Fargate cluster, with load balancing and autoscaling services.

### Code Flow

To maintain consistency and code quality, the following flow is recommended:

**Routes** -> **Middleware** -> **Controller** -> **Actions** -> **Repository**

All business logic must be contained within the `Actions`.

## Getting Started (Local Environment)

### Prerequisites

- [Docker](https://www.docker.com/get-started) installed on your machine.

### Setup Instructions

1.  **Clone the repository:**
    ```sh
    git clone [URL_DO_REPOSITORIO]
    cd [NOME_DA_PASTA_DO_PROJETO]
    ```

2.  **Create the environment file:**
    Duplicate the `.env.example` file located in the `src/` directory and rename it to `.env`.
    ```sh
    cp src/.env.example src/.env
    ```
    Update the variables in `src/.env` with your local configuration, especially the database connection details.

3.  **Build and run the containers:**
    ```sh
    docker-compose up --build -d
    ```

4.  **Generate the application key:**
    Enter the container and run the artisan command to generate the key.
    ```sh
    docker-compose exec php-nginx php artisan key:generate
    ```

The application should now be accessible at [http://localhost:8080](http://localhost:8080).

## Testing

To run the project's automated tests, execute the following command:

```sh
docker-compose exec php-nginx php artisan test
```

## Documentation

Project documentation is generated using [MkDocs](https://www.mkdocs.org/). The source files are in the `docs/` directory.

To view the documentation locally, you may need to install MkDocs and run it, or check if it's integrated into the project's build process.

## Notes

- Ensure that the database is properly configured and that the environment variables are correctly set in the `.env` file.
- Keep the code well-documented and organized to facilitate project maintenance and evolution.
- Follow the recommended code flow to ensure development consistency and quality.
