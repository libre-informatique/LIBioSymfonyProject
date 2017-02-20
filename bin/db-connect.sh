*#!/bin/bash

LINE=1
TMP=1;
[ "$1" != "" ] && TMP="$1"
[ "$TMP" -gt 1 ] &> /dev/null && LINE=$TMP

# user
echo $PGUSER;
[ -z "$PGUSER" ] && \
export PGUSER=`grep database_user app/config/parameters.yml | grep -v '^#' | sed "s/\s*database_user:\s\s*['\"]\{0,1\}\(\w*\)['\"]\{0,1\}$/\1/g" | head -n$LINE | tail -n1`

# passwd
[ -z "$PGPASSWORD" ] && \
export PGPASSWORD=`grep database_password app/config/parameters.yml | grep -v '^#' | sed "s/\s*database_password:\s\s*['\"]\{0,1\}\([^'^\"]*\)['\"]\{0,1\}$/\1/g" | head -n$LINE | tail -n1`

# host
[ -z "$PGHOST" ] && \
export PGHOST=`grep database_host app/config/parameters.yml | grep -v '^#' | sed "s/\s*database_host:\s\s*['\"]\{0,1\}\([^'^\"]*\)['\"]\{0,1\}$/\1/g" | head -n$LINE | tail -n1`

# db
[ -z "$PGDATABASE" ] && \
export PGDATABASE=`grep database_name app/config/parameters.yml | grep -v '^#' | sed "s/\s*database_name:\s\s*['\"]\{0,1\}\([^'^\"]*\)['\"]\{0,1\}$/\1/g" | head -n$LINE | tail -n1`

echo "+------------------------------------------------+"
echo "| Host    : $PGHOST"
echo "| Database: $PGDATABASE"
echo "| User    : $PGUSER"
echo "+------------------------------------------------+"
echo ""
psql
