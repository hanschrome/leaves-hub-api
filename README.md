# Leaves Hub Api

This is the backend of the application Leaves Hub

## Quick start

```make up```

It will open a docker container with a listening port 8001.

Test it with:

```$ curl http://localhost:8001/api/v1/ping```

In case of storage permission issues:

```sudo chmod 777 -R storage``` (just for develop environment)

## Running tests

1. Start the application for testing purposes

```make up-for-testing```

2. Prepare the database for the feature tests

```make regenerate-testing```

3. Run tests

```make testing```

4. To run again tests, restore the testing database

```make regenerate-testing && make testing```

## Dependencies

- Docker
- Docker Compose
