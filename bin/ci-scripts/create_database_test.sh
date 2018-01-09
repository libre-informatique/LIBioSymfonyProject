#!/usr/bin/env bash
set -ev

# Database creation

###
### postgresql
###

# needed in .travis.yml
#services:
#  - postgresql
# or here :  sudo /etc/init.d/postgresql start

psql -w -c "DROP DATABASE IF EXISTS lisem;" -U postgres
psql -w -c "DROP ROLE IF EXISTS lisem_user;" -U postgres

# (we try to create a travis user)
psql -c "CREATE USER lisem_user WITH PASSWORD 'lisem';" -U postgres
psql -c 'ALTER ROLE lisem_user WITH CREATEDB;' -U postgres

psql -c 'CREATE DATABASE lisem;' -U postgres
psql -c 'ALTER DATABASE lisem OWNER TO lisem_user' -U postgres


psql -c 'CREATE EXTENSION "uuid-ossp";' -U postgres -d lisem

###
###
###
