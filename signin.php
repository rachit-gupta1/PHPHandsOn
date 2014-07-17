<!DOCTYPE html>
<head>
    <title>PHP Hands On App</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <?php
		include('./dbHandler.php');
		$dbHandler = new Db_Handler("localhost", "root", "root");
		$emailID = $_POST['userEmail'];
		$passwd = $_POST['passWord'];
		session_start();
		if (isset($emailID))
		{
    		$_SESSION['email'] = $emailID;
		}

		$dbHandler->openConnection();
		if(!$dbHandler->checkEmailExists($emailID))
		{
			echo 'Email does not exist';
		}
		else
		{
			if($dbHandler->checkPassword($emailID, $passwd))
			{
				header( "refresh:0;url=index.php" );
			}
			else
			{
				echo 'Email and password do not match';
			}
		}
	?>

</head>
<body>
    <div id="container">
        <h1 class="col-sm-offset-2">Sign In!</h1>
        <br />
        <form class="form-horizontal" role="form" action="signin.php" method="POST">
            <div class="form-group">
                <label for="emailId" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="email" class="form-control" id="emailId" placeholder="Email" name="userEmail" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-3">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="passWord" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
       </form>
    </body>
</html>