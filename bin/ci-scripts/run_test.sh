#!/usr/bin/env sh


OUTPUTDIR=tests/_output

# clean output
rm -rf $OUTPUTDIR/*.png
rm -rf $OUTPUTDIR/*.html

CODECEPTCMD="bin/codecept run -d --steps --fail-fast --no-interaction --no-exit"


CODECEPTGROUP=$@
if [ $# -eq 0 ]
then
   CODECEPTGROUP="login menu user crm" # variety ecommerce" # all"
fi



for i in $CODECEPTGROUP
do
    $CODECEPTCMD -g $i --env=firefox
    #$CODECEPTCMD -g $i --env=chrome
done


# check output
NBFAIL=$(find $OUTPUTDIR |grep fail|wc -w)
exit $NBFAIL;

