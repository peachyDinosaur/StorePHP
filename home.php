<?php
require_once 'Store.php';
require_once 'Connection.php';
require_once 'StoreTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new StoreTableGateway($connection);

$statement = $gateway->getStores();
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
            <thead>
                <tr>
                    <th>Store Id</th>
                    <th>Region Id</th>
                    <th>Address</th>
                    <th>Manager</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    
                    echo '<td>' . $row['storeId'] . '</td>';
                    echo '<td>' . $row['regionId'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['manager'] . '</td>';
                    echo '<td>' . $row['phoneNumber'] . '</td>';
                    echo '<td>'
                    . '<a href="viewStore.php?id='.$row['storeId'].'">View</a> '
                    . '<a href="editStoreForm.php?id='.$row['storeId'].'">Edit</a> '
                    . '<a class="deleteStore" href="deleteStore.php?id='.$row['storeId'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createStoreForm.php">Create Store</a></p>
    </body>
</html>



