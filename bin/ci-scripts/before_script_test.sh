#!/usr/bin/env sh
set -ev

######### TOOLS

# start fake x
/sbin/start-stop-daemon --start --quiet --pidfile /tmp/xvfb_99.pid --make-pidfile --background --exec /usr/bin/Xvfb -- :99 -ac -screen 0 1680x1050x16
export DISPLAY=:99

sel_start_date=$(date)
bin/selenium-server-standalone -debug > selenium.log 2>&1  &
# -debug true

set +e
while [ $(netstat -an | grep LISTEN | grep 4444| wc -l) -eq 0 ]
do
    echo $(date) " wait for selenium start... (since " $sel_start_date ")";
    ps -eaf | grep selenium;
    netstat -an | grep LISTEN | grep 4444;
    sleep 10;
done

echo $(date) " it look like selenium is started (waiting since " $sel_start_date ")";



#### LISEM
# start server as prod for travis timeout on dev...
# bin/console server:stop
bin/console cache:clear --no-interaction
bin/console server:start --no-interaction 127.0.0.1:8042 # --env=prod

