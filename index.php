<?php
require "ParseConfig.php";
include_once 'header.php';
include_once 'user-model.php';

if (isset($_POST['loginButtonClick'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $responseDictionary =  UserModel::loginCheck($username,$password);
    $json = json_decode($responseDictionary, true);
    echo $json['result']['username'];
}
?>

<div class="clearfix"></div><br />

<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>Username</td>
                <td><input type='text' name='username' class='form-control' value="" required></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type='password' name='password' class='form-control' value="" required></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <button type="submit" class="btn btn-primary" name="loginButtonClick">
                        <span class="glyphicon glyphicon-edit"></span>  Login
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>

