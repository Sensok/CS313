<html>
<head>
</head>
<body>
<?php

  if(!isset($_COOKIE['count']))
  {
     $cookie=1;
     setcookie("count",$cookie);
     ?> <meta http-equiv="refresh" content="0;URL=survey.html">
            <?php
            }
  else
  {
     ?><meta http-equiv="refresh" content="0;URL=survey.php">
        <?php
  }
  ?>
</body>
</html>