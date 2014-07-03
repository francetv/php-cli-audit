Audit CLI
=========

Audit CLI is a command line tool (CLI) providing useful commands to audit PHP projects source code.

## Installation

### 1/ Phar download

You can download the Phar packaged version on http://... (@todo)

    $ curl -sS -O http://.../audit.phar
    $ sudo mv audit.phar /usr/local/bin/audit

### 2/ Git clone

You can directly clone the GitHub repository :

    $ git clone git@github.com:francetv/php-cli-audit.git
    $ cd php-cli-audit
    $ composer.phar install
    $ ./bin/audit package
    $ sudo mv audit.phar /usr/local/bin/audit

## Usage

    $ audit
    $ audit -h
    $ audit <command>

## Tests

You can run the unit tests with the following command:

    $ cd php-cli-audit
    $ composer.phar install
    $ ./bin/phpunit --colors test

Resources
---------

[Audit CLI](https://github.com/francetv/php-cli-audit)
