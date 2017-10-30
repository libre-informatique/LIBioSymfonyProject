#!/usr/bin/env sh

OUTPUTDIR=tests/_output

# clean output
rm -rf $OUTPUTDIR/*.png
rm -rf $OUTPUTDIR/*.html

CODECEPTCMD="bin/codecept run -d --steps --fail-fast --no-interaction --no-exit --env=chrome"

CODECEPTGROUP=$@
if [ $# -eq 0 ]
then
   CODECEPTGROUP="login menu user crm variety ecommerce" 
fi



for i in $CODECEPTGROUP
do
    $CODECEPTCMD -g $i
done


# check output
NBFAIL=$(find $OUTPUTDIR |grep fail|wc -w)
exit $NBFAIL;
