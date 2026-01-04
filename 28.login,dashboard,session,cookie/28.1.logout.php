<!--  28. Write PHP Script to create and login form to implement session and cookie.
-->

<?php
session_start();
session_destroy();

setcookie('username',null,time()-1);
setcookie('name',null,time()-1);

header('location:28.3.sessioncookie.php');
?>
