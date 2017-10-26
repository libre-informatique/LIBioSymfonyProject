#!/usr/bin/env sh
set -ev

CODECEPTCMD="bin/codecept run -d --steps --fail-fast --no-interaction "

CODECEPTGROUP=$@
if [ $# -eq 0 ]
then
   CODECEPTGROUP="login menu crm variety ecommerce scenarii" 
fi

for i in $CODECEPTGROUP
do
    $CODECEPTCMD -g $i
done
