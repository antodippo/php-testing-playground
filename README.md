# Testing playground

This is a simple playground repository for PHP, and it includes [PHPUnit](https://phpunit.de/), [Infection](https://infection.github.io/) and [PHPSpec](http://phpspec.net/) frameworks.

### Usage

Build the Docker image:

```make build```

Install dependencies:

```make dependencies```

Run PHPUnit tests:

```make phpunit-test```

Run PHPUnit tests with HTML coverage:

```make phpunit-test-coverage```

Run Infection mutation tests:

```make infection```

Run PHPSpec tests:

```make phpspec```

### NuclearReactor example

This example wants to show how mutation testing work, and is taken from this article: https://medium.com/appsflyer/tests-coverage-is-dead-long-live-mutation-testing-7fd61020330e