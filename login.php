<?php
session_start();
include_once('app/user.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $object = new User();
    $object->Login($username, $pass);
}

?>



<center>
    <h2>Login</h2>
</center>
<form method="POST" action="">
    <table width="400px" border="2" cellpadding="10" cellspacing="10" bgcolor="#DAA520" align="center">
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Oke"></td>
        </tr>
    </table>
</form>