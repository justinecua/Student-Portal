<?php

require './predis/autoload.php';

$redis = new Predis\Client;
echo $redis->ping();
?>