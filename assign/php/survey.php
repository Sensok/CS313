<html>
<head>
    <title>PHP Survey Results</title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="stylesheet" type="text/css" href="../../css/index.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/menu.css"/>
</head>

<body class="background">


  <div id="menu">
        <ul>
         <li><a href="../../index.html">Home</a></li>
           <li><a href="../assign02.html">CS 313 Assigments</a></li>
           <li><a href="../../schedule.html">My Schedule</a></li>
         </ul>
  </div>
<div id="header">
<h3>POLL RESULTS</h3>
<?php


$fname="/var/www/html/assign/php/results.txt";
$lines=file($fname, FILE_IGNORE_NEW_LINES);
$newVal=array_values($_POST);
$qu = 0;
for($i = 0; $i < 4; $i++)
{
   if($newVal[$i] == "No")
      $lines[$qu + 1] += 1;
   else if($newVal[$i] =="yes")
      $lines[$qu] += 1;
   $qu +=2;

}

//file_put_contents($fname, implode("\r\n",$lines));
$fp=fopen($fname, "w+");

foreach($lines as $key => $value)
{
   fwrite($fp,$value."\r\n");
}
fclose($file);
echo("<h3>Here are the results!</h3><br/>");

$q = 1;
for($j = 0; $j < 7; $j)
{
   echo("Question " . $q . ":<br/>Yes: " .
        $lines[$j++] . " No: " . $lines[$j++]
        . "<br/>");
   $q++;
}

?>

</div>
</body>




</html>
