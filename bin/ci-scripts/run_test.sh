#!/usr/bin/env sh

CODECEPTCMD="bin/codecept run -d --steps --fail-fast --no-interaction "

$CODECEPTCMD -g login

$CODECEPTCMD -g menu

$CODECEPTCMD -g crm

#$CODECEPTCMD -g ecommerce
