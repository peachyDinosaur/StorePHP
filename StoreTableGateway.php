<?php

class StoreTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getStores() {
        // execute a query to get all stores
        $sqlQuery = "SELECT * FROM stores";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve stores");
        }

        return $statement;
    }

    public function getStoreById($storeId) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM stores WHE"
                . "RE storeId = :storeId";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "storeId" => $storeId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not find store");
        }

        return $statement;
    }

    public function insertStore($address, $manager, $phoneNumber ) {
        $sqlQuery = "INSERT INTO stores " .
                "(address, manager, phoneNumber) " .
                "VALUES (:address, :manager, :phoneNumber)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $address,
            "manager" => $manager,
            "phoneNumber" => $phoneNumber
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert store");
        }

        $storeId = $this->connection->lastInsertId();

        return $storeId;
    }

    public function deleteStore($storeId) {
        $sqlQuery = "DELETE FROM stores WHERE storeId = :storeId";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "storeId" => $storeId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete store");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateStore($storeId, $regionId, $address, $manager, $phoneNumber ) {
        $sqlQuery =
                "UPDATE stores SET " .
                "regionId = :regionId, " .
                "address = :address, " .
                "manager = :manager, " .
                "phoneNumber = :phoneNumber " .
                "WHERE storeId = :storeId";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "storeId" => $storeId,
            "regionId" => $regionId,
            "address" => $address,
            "manager" => $manager,
            "phoneNumber" => $phoneNumber
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}


