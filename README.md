LISem
===================

LISem is an ERP specialized for seeds producers and craftmen. It uses many libraries from :

* [Blast Project](https://github.com/blast-project)
* [Libre Informatique](https://github.com/libre-informatique)
* [Sylius](http://docs.sylius.org/en/latest/)

THIS PROJECT IS STILL UNUSABLE, IT'S A WORK IN PROGRESS

Installation
------------

### Download project

With SSH (if you have a GitHub account) :

```
$ git clone git@github.com:libre-informatique/LISemSymfonyProject.git
```

... or with HTTPS:

```
$ git clone https://github.com/libre-informatique/LISemSymfonyProject
```

### Install dependencies (vendors)

Make sure you have [the latest version of composer](https://getcomposer.org/download/) installed, then :

```
$ cd LIBioSymfonyProject
$ composer install
```

### Create and configure the database

Create a database. For example, if you are using PostgreSQL :

```sql
CREATE USER lisem_user WITH PASSWORD 'this-is-my-lisem-password';
CREATE DATABASE lisem;
GRANT ALL PRIVILEGES ON DATABASE lisem TO lisem_user;
\connect lisem;
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
```

Configure the LiSem application according to your database settings:

```yaml
# app/config/parameters.yml
parameters:
    database_host: 127.0.0.1
    database_port: 5432
    database_name: lisem
    database_user: lisem_user
    database_password: this-is-my-lisem-password
```

Create tables:

```bash
$ bin/console doctrine:schema:create
```

### Deploy assets

Sylius assets :

```
$ npm install
$ npm run gulp
```

### If you encounter cache and/or log directory problems ###

Add cache_dir parameter to your parameter.yml with the absolute path to the cache directory. Do the same action for the logs_dir parameter

Installation From Scratch
-------------------------
 
See [this documentation](README-FROM-SCRATCH.md) to install the project into an existing (and already installed) Symfony 2 installation.
