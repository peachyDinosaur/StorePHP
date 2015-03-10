<?php
require_once 'Connection.php';
require_once 'StoreTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new StoreTableGateway($connection);


$address = $_POST['address'];
$manager = $_POST['manager'];
$phoneNumber= $_POST['phoneNumber'];
$regionId   = filter_input(INPUT_POST, 'regionId',  FILTER_SANITIZE_NUMBER_INT);
if ($regionId == -1) {
    $regionId = NULL;
}

$id = $gateway->insertStore($address, $manager, $phoneNumber, $regionId);

header('Location: home.php');



