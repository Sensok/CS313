<html>
<head>
<title>Count Page Access</title>
</head>
<body>
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_COOKIE['count']))
{
   ?>
   Welcome! This is the first time you have viewed this page.
      <?php
      $cookie = 1;
   setcookie("count", $cookie);
}
else
{
   $cookie = ++$_COOKIE['count'];
   setcookie("count", $cookie);
   ?>
      You have viewed this page <?php echo $_COOKIE['count'] ?> times
         <?php }// end else ?>
</body>
</html>