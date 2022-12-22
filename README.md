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

1. Start the application for testing purposes (Wait ~20 seconds to let mysql start)

```make up-for-testing```

2. Run tests (It will regenerate database)

```make testing```

## Dependencies

- Docker
- Docker Compose


## @todo

- Move to Shared kernel shared entities.
- Mobe "src" to a bounded context so app is scalable and meaningful
- Better flow in github actions for testing purposes
- More unit tests plz
- All use cases are covered for testing
