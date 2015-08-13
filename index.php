<?php
ob_start();
require "ParseConfig.php";
include_once 'header.php';
include_once 'user-model.php';

if (isset($_POST['loginButtonClick'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $response =  UserModel::loginCheck($username,$password);
    $rootDictionary = json_decode($response, true);
    
    if ($rootDictionary['code'] == 141) {

         $message = $rootDictionary['error'];
        
    } else {

        //$resutlDictionary = $rootDictionary['result'];
        header("Location:home.php");  
    }
}
?>

<div class="clearfix"></div><br />
<div class="container">
    <?php
    if (isset($message)) {
        
        echo '<div class="alert alert-danger">'.$message.'</div>';
    }
    ?>
</div>
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
                        <span class="glyphicon glyphicon-log-in"></span>  Login
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>

