build: ## Build Docker containers
	docker-compose build --no-cache

dependencies: ## Run Composer install
	docker-compose run --rm testing-playground composer install

phpunit-test: ## Run the testsuite
	docker-compose run --rm testing-playground vendor/bin/phpunit --testdox

phpunit-test-coverage: ## Run the testsuite showing coverage and export it in html (in var/coverage)
	docker-compose run --rm testing-playground vendor/bin/phpunit --testdox --coverage-html=var/coverage --coverage-text

infection: ## Run mutation testing with Infection adn export it in var/coverage
	docker-compose run --rm testing-playground vendor/bin/infection --threads=4

phpspec: ## Run mutation testing with Infection
	docker-compose run --rm testing-playground vendor/bin/phpspec run

shell: ## Bash into the container
	docker-compose run --rm testing-playground bash

# Based on https://suva.sh/posts/well-documented-makefiles/
help:  ## Display this help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-20s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

