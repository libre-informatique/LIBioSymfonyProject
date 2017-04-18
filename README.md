LISem
===================

LISem is an ERP specialized for seeds producers and craftmen. It uses many libraries developped in generic ways.

THIS PROJECT IS STILL UNUSABLE, IT'S A WORK IN PROGRESS

Installation
------------

First thing, [get composer.phar](https://getcomposer.org/download/)

```
$ curl -sS https://getcomposer.org/installer | php
```

### Git install

```
$ git clone https://github.com/libre-informatique/LIBioSymfonyProject .
$ composer install
```

### Conclusion

Then you would have the following directory structure :

```
.
├── app
├── src
└── web
```

At this point, if you don't have any Exceptions, you're done !

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
