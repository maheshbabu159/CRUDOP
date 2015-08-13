<?php
require "ParseConfig.php";
include_once 'header.php';

use Parse\ParseQuery;

$query = new ParseQuery("_User");
$usersList = $query->find();
?>
<div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar-nav">
                    <div class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="visible-xs navbar-brand">Sidebar menu</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Menu Item 1</a></li>
                                <li><a href="#">Menu Item 2</a></li>
                                <li><a href="#">Menu Item 3</a></li>
                                <li><a href="#">Menu Item 4</a></li>
                                <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </div>
    </div>
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

        <?php for ($i = 0; $i < count($usersList); $i++) {
            $userObject = $usersList[$i];
            ?>        
            <tr>
                <th><?php echo $i + 1; ?></th>
                <th><?php echo $userObject->get("firstName"); ?></th>
                <th><?php echo $userObject->get("lastName"); ?></th>
                <th><?php echo $userObject->get("email"); ?></th>
                <th><?php echo $userObject->get("phoneNumber"); ?></th>
                <th>
                    <a href="edit-data.php?$objectId=<?php echo $userObject->getObjectId() ?>" class="btn btn-large btn-warning"><i class="glyphicon glyphicon-pencil"></i> &nbsp;Edit</a>
                    <a href="delete.php?objectId=<?php echo $userObject->getObjectId() ?>" class="btn btn-large btn-danger"><i class="glyphicon glyphicon-remove"></i> &nbsp;Delete</a>
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
