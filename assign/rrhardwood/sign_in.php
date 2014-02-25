<html>

<head>
    <link rel="stylesheet" type="text/css" href="rrhardwood.css" />
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
</head>

<body id="background">

    <div id="top">
        <ul>
            <li>
                <a href="index.php?action=signout">Sign Out</a>
            </li>
            <li>
                <a href="http://www.randrhardwood.com">Home</a>
            </li>
        </ul>
    </div>
   
    <div id="pages">
        <h2>Please Sign in or A New Account</h2>
        <form method="post">
            <div>
                <label>Login</label>
                <input type="text" class="form-control" id="inputEmail3" placeholder="Username" name="user">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
            </div>
            <div>
                <input type="hidden" name="action" value="signin">
                <button type="submit" class="btn btn-default">Sign in</button>
            </div>
        </form>
        <form method="post">
            <div>
                <label>Login</label>
                <input type="username" class="form-control" id="inputEmail3" placeholder="Username" name="user">
            </div>
            <div>
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password Once" name="pass1">
            </div>
            <div>
                <label>Pass Code</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Pass Code" name="passCode">

                <input type="hidden" name="action" value="signup">
                <button type="submit" class="btn btn-default">Sign Up</button>
            </div>
        </form>
    </div>
</body>

</html>