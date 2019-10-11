# Testing playgroud

This is a simple playground repository for PHP, and it includes [PHPUnit](https://phpunit.de/) and [Infection](https://infection.github.io/) framework.

### Usage

Build the Docker image:

```docker-compose build```

Run PHPUnit tests:

```docker-compose run --rm testing-playground vendor/bin/phpunit```

Run PHPUnit tests:

```docker-compose run --rm testing-playground vendor/bin/phpunit --coverage-html=var/coverage```

Run Infection mutation tests:

```docker-compose run --rm testing-playground vendor/bin/infection```

### NuclearReactor example

This example wants to show how mutation testing work, and is taken from this article: https://medium.com/appsflyer/tests-coverage-is-dead-long-live-mutation-testing-7fd61020330e