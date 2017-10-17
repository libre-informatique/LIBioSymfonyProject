#!/usr/bin/env sh

codecept run -d --steps --fail-fast --no-interaction --no-exit
cat selenium.log

echo # Ah ah return 0
