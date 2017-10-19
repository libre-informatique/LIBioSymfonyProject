#!/usr/bin/env sh

bin/console doctrine:schema:update --em=default --dump-sql
bin/console doctrine:schema:update --em=session --dump-sql
bin/codecept run -d --steps --fail-fast --no-interaction
