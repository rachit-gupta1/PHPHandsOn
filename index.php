<!DOCTYPE html>
<head>
    <title>PHP Hands On App</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="container">
        <h1 class="col-sm-offset-2">Sign In!</h1>
        <br />
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
       </form>
       <br />
       <h2 class="col-sm-offset-2">Don't have an account?</h2>
       <br />
       <form action="createAccount.php" method="get">
       <div class="form-group">
                <div class="col-sm-offset-2">
                   <input type="submit" class="btn btn-primary" value="Create account"/>
               </div>
        </div>
      </form>
   </div>
</body>
</html>