<?php
 class Region {
    private $regionId; 
    private $region;    
    private $email;
    private $managerName;
    private $phoneNumber;
    
    public function __construct($regionId, $region, $email, $managerName, $phoneNumber) {
        $this->regionId = $regionId;
        $this->region = $region;
        $this->email = $email;
        $this->managerName = $managerName;
        $this->phoneNumber = $phoneNumber;
    }
    
    public function getregionId() { return $this->region; }
    public function getregion() { return $this->regionId; }
    public function getemail() { return $this->email; }
    public function getmanagerName() { return $this->managerName; }
    public function getphoneNumber() { return $this->phoneNumber; }
}



