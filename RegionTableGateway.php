<?php

class RegionTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getRegions() {
        // execute a query to get all regions
        $sqlQuery = "SELECT * FROM region";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve region");
        }

        return $statement;
    }

    public function getRegionById($regionId) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM region WHE"
                . "RE regionId = :regionId";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regionId" => $regionId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not find region");
        }

        return $statement;
    }

    public function insertRegion($region, $managerName, $phoneNumber, $email ) {
        $sqlQuery = "INSERT INTO region " .
                "(region, managerName, phoneNumber, email) " .
                "VALUES (:region, :managerName, :phoneNumber, :email)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "region" => $region,
            "managerName" => $managerName,
            "phoneNumber" => $phoneNumber,
            "email" => $email
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert region");
        }

        $regionId = $this->connection->lastInsertId();

        return $regionId;
    }

    public function deleteRegion($regionId) {
        $sqlQuery = "DELETE FROM region WHERE regionId = :regionId";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regionId" => $regionId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete region");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateRegion($regionId, $region, $managerName, $phoneNumber, $email ) {
        $sqlQuery =
                "UPDATE region SET " .
                "region = :region, " .
                "managerName = :managerName, " .
                "phoneNumber = :phoneNumber, " .
                "email = :email " .
                "WHERE regionId = :regionId";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regionId" => $regionId,
            "region" => $region,
            "managerName" => $managerName,
            "phoneNumber" => $phoneNumber,
            "email" => $email    
        );


        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}


