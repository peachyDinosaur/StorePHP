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


$region = $_POST['region'];
$managerName = $_POST['managerName'];
$phoneNumber= $_POST['phoneNumber'];
$email= $_POST['email'];

$id = $gateway->insertRegion($region, $managerName, $phoneNumber, $email);

header('Location: regionTable.php');



