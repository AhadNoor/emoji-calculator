# emoji calculator

This wiki is for emoji simple calculator. This is intended to develop as playground for symfony 4 beginners

## Development Stack

- PHP: 7.4 +
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
- run `npm i` to install the dependencies
- run `npm run build` to  creates a build directory with a production build
- run php -S localhost:8000 -t public/
- In next version, we will crete docker compose to run the application using docker and browse
- to fix folder permissions: https://symfony.com/doc/current/setup/file_permissions.html


## How to run test cases

[See the test guide document](./docs/test_guide.md) 


