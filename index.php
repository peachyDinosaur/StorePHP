<?php
require_once 'Store.php';
require_once 'Connection.php';
require_once 'StoreTableGateway.php';
require_once 'Region.php';
require_once 'RegionTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new StoreTableGateway($connection);

$statement = $gateway->getStores();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
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
                    echo '<td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                
                ?>
            </tbody>
        </table>
                                    <input type="button"
                                   value="Home"
                                   name="Home"                                   
                                   onclick="document.location.href = 'regiontest.php'"
                                   />
       
    </body>
</html>





