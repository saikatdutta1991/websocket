<?php

echo 'start';
$r  = system("fuser -k 9003/tcp");

echo "result : $r";