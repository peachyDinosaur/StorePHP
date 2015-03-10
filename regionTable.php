<?php

require_once 'Connection.php';
require_once 'RegionTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new RegionTableGateway($connection);

$statement = $gateway->getRegions();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/region.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'menu.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Region Id</th>
                    <th>Region</th>
                    <th>Manager</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Actions</th>
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
                    echo '<td>'
                    . '<a href="viewRegion.php?id='.$row['regionId'].'">View</a> '
                    . '<a href="editRegionForm.php?id='.$row['regionId'].'">Edit</a> '
                    . '<a class="deleteRegion" href="deleteRegion.php?id='.$row['regionId'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createRegionForm.php">Create Region</a></p>
    </body>
</html>



