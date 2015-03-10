<?php
require_once 'Region.php';
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
                    echo '<td>Region Id</td>'
                    . '<td>' . $row['regionId'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Region </td>'
                    . '<td>' . $row['region'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Manager Name</td>'
                    . '<td>' . $row['managerName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Phone Number</td>'
                    . '<td>' . $row['phoneNumber'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Email </td>'
                    . '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editRegionForm.php?id=<?php echo $row['regionId']; ?>">
                Edit Region</a>
            <a class="deleteRegion" href="deleteRegion.php?id=<?php echo $row['regionId']; ?>">
                Delete Region</a>
        </p>
    </body>
</html>



