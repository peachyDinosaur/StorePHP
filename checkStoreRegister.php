<?php
require_once 'Store.php';
require_once 'Connection.php';
require_once 'StoreTableGateway.php';

$connection = Connection::getInstance();

$gateway = new StoreTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$manager = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$phoneNumber = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_INT);

$errorMessage = array();
if ($address === FALSE || $address === '') {
    $errorMessage['username'] = 'address must not be blank<br/>';
}

if ($manager === FALSE || $manager === '') {
    $errorMessage['manager'] = 'Manager must not be blank<br/>';
}

if ($phoneNumber === FALSE || $phoneNumber === '') {
    $errorMessage['phoneNumber'] = 'phoneNumber must not be blank<br/>';
}


if (empty($errorMessage)) {
    $gateway->insertUser($address, $manager, $phoneNumber);
}
else {
    require 'CreateStoreForm.php';
}


