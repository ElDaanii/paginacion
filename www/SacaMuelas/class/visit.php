<?php 
class visit{
    public $patients;
    public $date;
    public $amount;
    public $debt;
    public $id;


    public function __construct($patients, $date, $amount, $debt, $id){
        $this->patients = $patients;
        $this->date = $date;
        $this->amount = $amount;
        $this->debt = $debt;
        $this->id = $id;
    }

    public function getPatients(){
        return $this->patients;
    }
    public function getDate(){
        return $this->date;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function getDebt(){
        return $this->debt;
    }
    public function getId(){
        return $this->id;
    }

    public function setPatients($patients){
        $this->patients = $patients;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setAmount($amount){
        $this->amount = $amount;
    }
    public function setDebt($debt){
        $this->debt = $debt;
    }
    public function setId($id){
        $this->id = $id;
    }
}