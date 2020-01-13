<?php
declare(ticks = 1);

function signal_handler($signal) {
    print "catch you ";
    pcntl_alarm(5);
}

pcntl_signal(SIGALRM, "signal_handler", true);
pcntl_alarm(5);

while(1) {
}
?>