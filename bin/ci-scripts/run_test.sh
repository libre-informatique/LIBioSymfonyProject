#!/usr/bin/env sh


bin/codecept run -d --steps --fail-fast --no-interaction

# try on debug
sudo apt-get install lynx
for i in tests/_output/*.html
do
    echo '========================================'
    echo $i
    echo '========================================'
    lynx -dump $i
    echo '========================================'
done


#if [ -e tests/_output/001_CnxCept.fail.html ]
#then
#    cat tests/_output/001_CnxCept.fail.html
#fi

# --no-exit
# echo # Ah ah return 0
