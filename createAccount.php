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
</head>
<body>
    <h1 class="text-center">Create Account</h1>
    <br /> 
    <h3 class="col-sm-offset-2">Account Details</h3>
    <br />
    <form  class="form-horizontal" role="form">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" required />
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="password" class="form-control" id="password" placeholder="Enter password" required />
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
                <input type="text" class="form-control" id="inputName" placeholder="Enter First Name" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input type="text" class="form-control" id="inputLastName" placeholder="Enter Last Name" required>
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
