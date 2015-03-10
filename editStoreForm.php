<?php
require_once 'Store.php';
require_once 'Connection.php';
require_once 'StoreTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$storeId = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new StoreTableGateway($connection);

$statement = $gateway->getStoreById($storeId);
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
        <script type="text/javascript" src="js/store.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Store Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editStoreForm" name="editStoreForm" action="editStore.php" method="POST">
            <input type="hidden" name="storeId" value="<?php echo $storeId; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Region Id</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['regionId'])) {
                                    echo $_POST['regionId'];
                                }
                                else echo $row['regionId'];
                            ?>" />
                            <span id="regionIdError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['regionId'])) {
                                    echo $errorMessage['regionId'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                else echo $row['address'];
                            ?>" />
                            <span id="addressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager</td>
                        <td>
                            <input type="text" name="manager" value="<?php
                                if (isset($_POST) && isset($_POST['manager'])) {
                                    echo $_POST['manager'];
                                }
                                else echo $row['manager'];
                            ?>" />
                            <span id="managerError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manager'])) {
                                    echo $errorMessage['manager'];
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
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Store" name="updateStore" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>



