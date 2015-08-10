<?php
include_once 'header.php';

require "ParseConfig.php";

use Parse\ParseUser;
use Parse\ParseQuery;

if (isset($_POST['btn-save'])) {

    $username = $_POST['username'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email_id'];
    $contact = $_POST['contact_no'];

    $query = new ParseQuery("_Role");
    $query->equalTo("objectId", "TO0UsKAfG9");
    $role = $query->first();

    $usersList = $query->find();

    $user = new ParseUser();

    $user->set("username", $username);
    $user->set("firstName", $fname);
    $user->set("lastName", $lname);
    $user->set("email", $email);
    $user->set("phoneNumber", $contact);
    $user->set("password", "1234");
    $user->set("role", $role);

    try {
        $user->signUp();
        header("Location: add-data.php?inserted");
        echo '<script language="javascript">';
        echo 'alert("New Record successfully added")';
        echo '</script>';
    } catch (ParseException $ex) {
        // Show the error message somewhere and let the user try again.
        header("Location: add-data.php?failure");
    }
}
?>

<div class="clearfix"></div>

<?php
if (isset($_GET['inserted'])) {
    ?>
    <div class="container">
        <div class="alert alert-info">
            <strong>WOW!</strong> Record was inserted successfully <a href="index.php">HOME</a>!
        </div>
    </div>
    <?php
} else if (isset($_GET['failure'])) {
    ?>
    <div class="container">
        <div class="alert alert-warning">
            <strong>SORRY!</strong> ERROR while inserting record !
        </div>
    </div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>First Name</td>
                <td><input type='text' name='first_name' class='form-control' required></td>
            </tr>

            <tr>
                <td>Last Name</td>
                <td><input type='text' name='last_name' class='form-control' required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type='text' name='username' class='form-control' required></td>
            </tr>
            <tr>
                <td>Your E-mail ID</td>
                <td><input type='text' name='email_id' class='form-control' required></td>
            </tr>

            <tr>
                <td>Contact No</td>
                <td><input type='text' name='contact_no' class='form-control' required></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Create New Record
                    </button>  
                    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php include_once 'footer.php'; ?>