<!--  27. Write PHP Script to create and validate login form with username and password.
-->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $err = [];
    if (isset($_POST['username']) && !empty($_POST['username']) && trim($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $err['username'] = 'Enter username';
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $err['password'] = 'Enter password';
    }

    //check number of error on $err array
    if (count($err) == 0) {
        if ($username == 'Bimal' && $password == 'Bimal123') {
           echo 'Login success';
        } else {
            echo 'Login failed';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
   <h1>Login Form</h1>
   <form action="" method="post">
    <label for="username">username</label>
    <input type="text" name="username" placeholder="Enter username" 
    value="<?php echo isset($username)?$username:'' ?>" />
    <?php echo isset($err['username'])?$err['username']:''; ?>
    <br/>
    <label for="password">Password</label>
    <input type="password" name="password" placeholder="Enter password" 
    value="<?php echo isset($password)?$password:'' ?>" />
    <?php echo isset($err['password'])?$err['password']:''; ?>
    <br/>
    <input type="submit" name="login" value="Login" />
   </form>

</body>
</html>