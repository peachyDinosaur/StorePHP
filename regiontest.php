<?php
require_once 'Region.php';
require_once 'Connection.php';
require_once 'RegionTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new RegionTableGateway($connection);

$statement = $gateway->getRegions();
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
                    <th>Region Id</th>
                    <th>Region </th>
                    <th>Manager Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    
                    echo '<td>' . $row['regionId'] . '</td>';
                    echo '<td>' . $row['region'] . '</td>';
                    echo '<td>' . $row['managerName'] . '</td>';
                    echo '<td>' . $row['phoneNumber'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
    </body>
</html>





