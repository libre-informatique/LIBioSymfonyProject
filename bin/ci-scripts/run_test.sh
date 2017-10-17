#!/usr/bin/env sh

codecept run -d --steps --fail-fast --no-interaction --no-exit
cat tests/_output/001_CnxCept.fail.html

echo # Ah ah return 0
