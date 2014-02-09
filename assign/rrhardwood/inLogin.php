<html>
  <body>
    <?php echo "Incorrect login, please try again!" ?>
    <form action="checkLogin.php" method="post">
      Username: <input type="text" name="user_name"/><br/>
      Password: <input type="password" name="pwd"/><br/>
      <input type="submit" value="Login"/>
    </form>
  </body>
</html>
