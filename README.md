# emoji calculator

This wiki is for emoji simple calculator. This is intended to develop as playground for symfony 4 beginners

## Development Stack

- PHP: 7.3 +
- Symfony: 4.4


## PHP Module requirements
- bcmath
- gd
- intl
- json
- libxml
- mbstring
- mcrypt
- tokenizer
- Zend OPcache
- PHP amqp
- PHP apcu
- yaml

To check for the application requirements automatically, follow the guideline:
- https://symfony.com/doc/current/reference/requirements.html


## How to run the application on dev environment
- install composer
- run `composer install --prefer-dist` to install the dependencies
- run `bin/console app:install` to prepare the application with pre-loaded data
- go to the application root folder
- run `php bin/console server:run` to run the application using Symfony PHP web server
- to fix folder permissions: https://symfony.com/doc/current/setup/file_permissions.html


## How to run test cases

[See the test guide document](./docs/test_guide.md) 


