<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo "hello";

echo exec('aws ec2 describe-tags     --filters Name=resource-id,Values=i-03d60333f2c1414ca Name=key,Values=langs');

?>
