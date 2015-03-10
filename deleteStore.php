<?php
require_once 'Store.php';
require_once 'Connection.php';
require_once 'StoreTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$storeId = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new StoreTableGateway($connection);

$gateway->deleteStore($storeId);

header("Location: home.php");
?>



