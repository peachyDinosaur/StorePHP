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

$storeId = $_POST['storeId'];
$regionId = $_POST['regionId'];
$address = $_POST['address'];
$manager = $_POST['manager'];
$phoneNumber= $_POST['phoneNumber'];

$gateway->updateStore($storeId, $regionId, $address, $manager, $phoneNumber);

//echo '<pre>';
//    print_r($_POST);
//'</pre>';
    

header('Location: home.php');








