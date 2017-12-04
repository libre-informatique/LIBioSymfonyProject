#!/usr/bin/env sh


export SYMFONY_DEPRECATIONS_HELPER=weak
export SILURL="/sil"

OUTPUTDIR=tests/_output

# clean output
rm -rf $OUTPUTDIR/*.png
rm -rf $OUTPUTDIR/*.html

CODECEPTCMD="bin/codecept run -d --steps --fail-fast --no-interaction"


CODECEPTGROUP=$@
if [ $# -eq 0 ]
then
   CODECEPTGROUP="login menu user crm" # variety ecommerce" # all"
fi



for i in $CODECEPTGROUP
do
    # merge env http://codeception.com/docs/07-AdvancedUsage#Environments
    $CODECEPTCMD -g $i --env=firefox,lisem
    #$CODECEPTCMD -g $i --env=chrome,lisem
done


# check output
NBFAIL=$(find $OUTPUTDIR |grep fail|wc -w)
exit $NBFAIL;

