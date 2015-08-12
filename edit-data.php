
<?php
require "ParseConfig.php";
include_once 'header.php';

use Parse\ParseUser;

$objectId = $_GET['$objectId'];

$query = ParseUser::query();

$userObject = $query->get($objectId);

if (isset($_POST['btn-update'])) {

    $username = $_POST['username'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email_id'];
    $contact = $_POST['contact_no'];

    $query = ParseUser::query();

    try {
        $user = $query->get($objectId);
        $user->set("username", $username);
        $user->set("firstName", $fname);
        $user->set("lastName", $lname);
        $user->set("email", $email);
        $user->set("phoneNumber", $contact);
        $user->set("password", "1234");
        $user->save();
        
    } catch (ParseException $ex) {
        // Show the error message somewhere and let the user try again.
        $msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
    }
}
?>

<div class="clearfix"></div>

<div class="container">
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
</div>

<div class="clearfix"></div><br />
<div class="container">
    <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>First Name</td>
                <td><input type='text' name='first_name' class='form-control' value="<?php echo $userObject->get("firstName"); ?>" required></td>
            </tr>

            <tr>
                <td>Last Name</td>
                <td><input type='text' name='last_name' class='form-control' value="<?php echo $userObject->get("lastName"); ?>" required></td>
            </tr>
            <tr>
                <td>User Name</td>
                <td><input type='text' name='username' class='form-control' value="<?php echo $userObject->get("username"); ?>" required></td>
            </tr>

            <tr>
                <td>Your E-mail ID</td>
                <td><input type='text' name='email_id' class='form-control' value="<?php echo $userObject->get("email"); ?>" required></td>
            </tr>

            <tr>
                <td>Contact No</td>
                <td><input type='text' name='contact_no' class='form-control' value="<?php echo $userObject->get("phoneNumber"); ?>" required></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-update">
                        <span class="glyphicon glyphicon-edit"></span>  Update this Record
                    </button>
                    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php include_once 'footer.php'; ?>