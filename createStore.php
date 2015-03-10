<?php
require_once 'Store.php';
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

$id = $gateway->insertStore($address, $manager, $phoneNumber);

header('Location: home.php');



