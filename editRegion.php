<?php
require_once 'Connection.php';
require_once 'RegionTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new RegionTableGateway($connection);

$regionId = $_POST['regionId'];
$region = $_POST['region'];
$managerName = $_POST['managerName'];
$phoneNumber = $_POST['phoneNumber'];
$email= $_POST['email'];

$gateway->updateRegion($regionId, $region, $managerName, $phoneNumber, $email);

//echo '<pre>';
//    print_r($_POST);
//'</pre>';
    

header('Location: regionTable.php');








