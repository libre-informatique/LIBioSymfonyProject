# ProjetLiBio

LiBio is an ERP specialized for seeds producers and craftmen

THIS PROJECT IS STILL UNUSABLE, IT'S YET A WORK IN PROGRESS

## Installation :

First thing, [get composer.phar](https://getcomposer.org/download/)

```
$ curl -sS https://getcomposer.org/installer | php
```

Now clone the project repository into your local development / remote production environment.

```
$ cd /path/to/your/project/directory/

git clone https://github.com/libre-informatique/LIBioSymfonyProject.git .
```

##### Note :
Don't forget to add the ``` .``` after the clone URL.
It will clone the github repository into your directory without creating the sub directory ```LIBioSymfonyProject```

You Will have the following directory structure :

```
.
├── app
├── src
└── web

```

Finalize the installation process by executing this command :

```
$ ./composer.phar update
```

Composer will install all vendors and will ask you your project parameters.

If you don't have any Exceptions, you're done !

##### Troubleshooting :
- modify composer.json by adding "minimum-stability": "dev" if you have unmet dependencies

- if your php version is < 5.6 use set phpunit version to "^4.8" in composer.json 

## Installation From Scratch

See [this documentation](README-FROM-SCRATCH.md) to install the project into an existing (and already installed) Symfony 2 installation.
