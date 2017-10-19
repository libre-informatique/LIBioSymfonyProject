#!/usr/bin/env sh

bin/console doctrine:schema:update  --dump-sql
bin/codecept run -d --steps --fail-fast --no-interaction
