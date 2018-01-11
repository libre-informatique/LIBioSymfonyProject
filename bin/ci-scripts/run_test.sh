#!/usr/bin/env bash


export SYMFONY_DEPRECATIONS_HELPER=weak
export SILURL="/lisem"

OUTPUTDIR=tests/_output

# clean output
rm -rf $OUTPUTDIR/*.png
rm -rf $OUTPUTDIR/*.html

CODECEPTCMD="bin/codecept run -vvv --debug --steps --no-interaction"


CODECEPTGROUP=$@
if [ $# -eq 0 ]
then
    CODECEPTGROUP="login menu user crm variety ecommerce" # all"
fi

for i in $CODECEPTGROUP
do

    if [ $i = 'route' ]
    then
        $CODECEPTCMD --no-exit -g route --env=phpbrowser,lisem
    else
        # merge env http://codeception.com/docs/07-AdvancedUsage#Environments
        $CODECEPTCMD --fail-fast -g $i --env=firefox,lisem
        #$CODECEPTCMD -g $i --env=chrome,lisem
    fi

done


# check output
NBFAIL=$(find $OUTPUTDIR |grep fail|wc -w)
#exit $NBFAIL;
