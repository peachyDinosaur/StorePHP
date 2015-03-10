<?php
 class Store {
    private $storeId;
    private $regionId;
    private $address;
    private $manager;
    private $phoneNumber;
    
    public function __construct($storeId, $regionId, $address, $manager, $phoneNumber) {
        $this->storeId = $storeId;
        $this->regionId = $regionId;
        $this->address = $address;
        $this->manager = $manager;
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getstoreId() { return $this->storeId; }
    public function getregionId() { return $this->regionId; }
    public function getaddress() { return $this->address; }
    public function getmanager() { return $this->manager; }
    public function getphoneNumber() { return $this->phoneNumber; }
}



