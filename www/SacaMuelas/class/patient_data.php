<?php 
class patient_data{
    public $id;
    public $name;
    public $address;


    public function __construct($id, $name, $address){
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getAddress(){
        return $this->address;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setAddress($address){
        $this->address = $address;
    }
}