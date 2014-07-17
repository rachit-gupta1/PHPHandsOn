<!DOCTYPE html>
<head>
    <title>Create Account</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
    function checkPassword(input)
    {
        if(input.value!=document.getElementById('password').value)
        {
            input.setCustomValidity("The two passwords dont match");
        }
        else
        {
            input.setCustomValidity("");
        }
    }
    </script>
    <?php
        include('./dbHandler.php');
        $dbHandler = new Db_Handler("localhost", "root", "test");
        $emailID = isset($_POST['userEmail']) ? $_POST['userEmail'] : '';
        $passwd = isset($_POST['passWord']) ? $_POST['passWord'] : '';
        $fname = isset($_POST['firstName']) ? $_POST['firstName'] : '';
        $lname = isset($_POST['lastName']) ? $_POST['lastName'] : '';
        if($emailID == '')
        {
            //do nothing
        }
        else
        {  
            $dbHandler->openConnection();
                if($dbHandler->checkEmailExists($emailID))
                {
                    echo "Email already exists, choose another one";
                }
                else
                {
                    if($dbHandler->createEntry($emailID,$passwd,$fname,$lname))
                        echo "Accout Created Successfully";
                    else
                        echo "Something Went Wrong";
                }
        }               
    ?>
</head>
<body>
    <h1 class="text-center">Create Account</h1>
    <br /> 
    <h3 class="col-sm-offset-2">Account Details</h3>
    <br />
    <form  class="form-horizontal" role="form" action="<?php $_PHP_SELF?>" method="POST">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="email" class="form-control" id="inputEmail" name="userEmail" placeholder="Enter email" required />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="password" class="form-control" id="password" name="passWord" placeholder="Enter password" required />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" required oninput="checkPassword(this)"/>
            </div>
        </div>
    <h3 class="col-sm-offset-2">Personal Details</h3>
    <br />
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="text" class="form-control" id="inputName" name="firstName" placeholder="Enter First Name" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Enter Last Name" required>
            </div>
        </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit"  class="btn btn-primary"> Create Account 
            </button>
        </div>
    </div>
    </form>
</body>
</html>
