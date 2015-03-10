<?php
require_once 'Connection.php';
require_once 'RegionTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$regionId = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new RegionTableGateway($connection);

$statement = $gateway->getRegionById($regionId);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/region.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Region Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editRegionForm" name="editRegionForm" action="editRegion.php" method="POST">
            <input type="hidden" name="regionId" value="<?php echo $regionId; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Region</td>
                        <td>
                            <input type="text" name="region" value="<?php
                                if (isset($_POST) && isset($_POST['region'])) {
                                    echo $_POST['region'];
                                }
                                else echo $row['region'];
                            ?>" />
                            <span id="regionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['region'])) {
                                    echo $errorMessage['region'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager Name</td>
                        <td>
                            <input type="text" name="managerName" value="<?php
                                if (isset($_POST) && isset($_POST['managerName'])) {
                                    echo $_POST['managerName'];
                                }
                                else echo $row['managerName'];
                            ?>" />
                            <span id="regionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['managerName'])) {
                                    echo $errorMessage['managerName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="phoneNumber" value="<?php
                                if (isset($_POST) && isset($_POST['phoneNumber'])) {
                                    echo $_POST['phoneNumber'];
                                }
                                else echo $row['phoneNumber'];
                            ?>" />
                            <span id="phoneNumberError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['phoneNumber'])) {
                                    echo $errorMessage['phoneNumber'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php
                                if (isset($_POST) && isset($_POST['email'])) {
                                    echo $_POST['email'];
                                }
                                else echo $row['email'];
                            ?>" />
                            <span id="email" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>                    
                    <tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Region" name="updateRegion" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>



