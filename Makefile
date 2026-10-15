.DEFAULT_GOAL := help

##########
## HELP ##
##########
.PHONY: help
help:
	@grep --extended-regexp '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

######################
## Tests and linter ##
######################
.PHONY: lint
lint: vendor/bin/phpcs ## Run the linter on the PHP files
	$(PHP) vendor/bin/phpcs . -p -s

.PHONY: lint-fix
lint-fix: vendor/bin/phpcbf ## Fix the errors detected by the linter
	$(PHP) vendor/bin/phpcbf . -p -s

bin/composer:
	mkdir -p bin/
	wget 'https://raw.githubusercontent.com/composer/getcomposer.org/298f4ba7b62708d16c291573e1c52811b5e494bd/web/installer' -O - -q | php -- --quiet --install-dir='./bin/' --filename='composer'

vendor/bin/phpcs: bin/composer
	bin/composer install --prefer-dist --no-progress
	ln -s ../vendor/bin/phpcs bin/phpcs

vendor/bin/phpcbf: bin/composer
	bin/composer install --prefer-dist --no-progress
	ln -s ../vendor/bin/phpcbf bin/phpcbf

node_modules/.bin/eslint:
	npm install

vendor/bin/phpstan: bin/composer
	bin/composer install --prefer-dist --no-progress

.PHONY: composer-test
composer-test: vendor/bin/phpstan
	bin/composer run-script test

.PHONY: composer-fix
composer-fix:
	bin/composer run-script fix

.PHONY: npm-test
npm-test: node_modules/.bin/eslint
	npm test

.PHONY: npm-fix
npm-fix: node_modules/.bin/eslint
	npm run fix

# TODO: Add shellcheck, shfmt, hadolint
.PHONY: test-all
test-all: composer-test npm-test

.PHONY: fix-all
fix-all: composer-fix npm-fix
