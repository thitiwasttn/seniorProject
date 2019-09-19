<?php
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
   // echo "email = " . $email;
//$email = 'twopee26@gmail.com';
    $command = escapeshellcmd('python3 /var/www/html/tn/my_python/smtp.py "' . $email . '" ');
    $output = shell_exec($command);
    if (strcmp($output,'complete')) {
        echo "we sent your new password to your email pls check your inbox or spam email";
    } else {
//       echo $output;
    echo "Error pls try again later";
    }
}
//print_r($output);
echo "<br><a href='/tn'>back</a>";
?>
