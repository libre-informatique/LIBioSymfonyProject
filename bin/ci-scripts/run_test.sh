#!/usr/bin/env sh


bin/console server:start --no-interaction

bin/console/codecept run -d --steps --fail-fast --no-interaction

#if [ -e tests/_output/001_CnxCept.fail.html ]
#then
#    cat tests/_output/001_CnxCept.fail.html
#fi

# --no-exit
# echo # Ah ah return 0
