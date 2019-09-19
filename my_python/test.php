<?php
$command = escapeshellcmd('python3 /var/www/html/tn/my_python/smtp.py');
$output = shell_exec($command);
echo $output;
?>