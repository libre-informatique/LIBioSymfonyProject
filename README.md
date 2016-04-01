LIBioSymfonyProject
===================

LIBio is an ERP specialized for seeds producers and craftmen. It uses many libraries developped in generic ways.

THIS PROJECT IS STILL UNUSABLE, IT'S YET A WORK IN PROGRESS

Installation
------------

First thing, [get composer.phar](https://getcomposer.org/download/)

```
$ curl -sS https://getcomposer.org/installer | php
```

### Composer

Then just run:

```
$ composer require libre-informatique/libio-project dev-master
```

### Git install (old school, but always working)

```
$ git clone https://github.com/libre-informatique/LIBioSymfonyProject .
$ composer update
```

### Conclusion

Then you would have get the following directory structure :

```
.
├── app
├── src
└── web
```
###PostgreSQL

If you are using PostgreSQL as your main database, you'll need to install postgresql-contrib and load the "uuid-ossp" extension :
```
  $ sudo apt-get install postgresql-contrib
  $ echo 'CREATE EXTENSION "uuid-ossp";' | psql [DB]
 ```


In order to login to the dashboard you need to generate the database tables  :

```
$ app/console (bin/console on symfony 3+) doctrine:schema:update --force
```

Then you need to create a user with admin capabilities:

```
$ app/console fos:user:create
$ app/console fos:user:promote --super [YOUR_USERNAME]
```

Troubleshooting
---------------

### If you are running PHP 5.4.x

You'll need some extra libraries:

```
$ composer require ircmaxell/password-compat
```

### If you have unresolved dependencies:

modify composer.json by adding ```"minimum-stability": "dev"```

### If your php version is < 5.6

Set phpunit version to "^4.8" in composer.json 

Installation From Scratch
-------------------------
 
See [this documentation](README-FROM-SCRATCH.md) to install the project into an existing (and already installed) Symfony 2 installation.
