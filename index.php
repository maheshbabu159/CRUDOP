<?php
require "ParseConfig.php";
include_once 'header.php'; 

use Parse\ParseQuery;

$query = new ParseQuery("_User");
$usersList = $query->find();

?>

<div class="clearfix"></div>

<div class="container">
    <a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
    <table class='table table-bordered table-responsive'>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E - mail ID</th>
            <th>Contact No</th>
            <th colspan="2" align="center">Actions</th>
        </tr>

        <?php for ($i = 0; $i < count($usersList); $i++) { $userObject = $usersList[$i];?>        
            <tr>
                <th>#</th>
                <th><?php echo $userObject->get("firstName"); ?></th>
                <th><?php echo $userObject->get("lastName"); ?></th>
                <th><?php echo $userObject->get("email"); ?></th>
                <th><?php echo $userObject->get("phoneNumber"); ?></th>
                <th>
                    <a href="edit-data.php?firstTime=true" class="btn btn-large btn-warning"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Edit</a>
                    <a href="delete.php?objectId=<?php echo $userObject->get("objectId");?>" class="btn btn-large btn-danger"><i class="glyphicon glyphicon-remove"></i> &nbsp;Delete</a>
                </th>
                
            </tr>        
        <?php } ?>
        <tr>
            <td colspan="7" align="center">
                <div class="pagination-wrap">

                </div>
            </td>
        </tr>

    </table>


</div>

<?php
include_once 'footer.php';
