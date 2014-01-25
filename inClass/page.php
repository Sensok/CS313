<html>

<head>

</head>

<body>
<h3> Your Information</h3>

Name: <?php echo $_POST["name"]; ?><br>
E-mail: <a href="mailto:<?php echo $_POST["email"]; ?>"><?php echo $_POST["email"]; ?></a><br>
Major: <?php echo $_POST["major"]; ?><br>
Paces You have visited: <br>
<?php $places = $_POST["places"];
if(!empty($places))
{
   $num = count($places);
   for ($i=0; $i < $num; $i++)
      echo($places[$i] . "<br/>");
}
?>

You Said:<br/>
<?PHP echo htmlspecialchars($_POST['comments']); ?>
</body>


</html>