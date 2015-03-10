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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/store.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Store Id</td>'
                    . '<td>' . $row['storeId'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Region Id</td>'
                    . '<td>' . $row['regionId'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager</td>'
                    . '<td>' . $row['manager'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Phone Number</td>'
                    . '<td>' . $row['phoneNumber'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editStoreForm.php?id=<?php echo $row['storeId']; ?>">
                Edit Store</a>
            <a class="deleteStore" href="deleteStore.php?id=<?php echo $row['storeId']; ?>">
                Delete Store</a>
        </p>
    </body>
</html>



