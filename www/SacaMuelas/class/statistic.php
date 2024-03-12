<?php
class statistic {
    public function moneyBills() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
        $bills = 0; 
        foreach ($clients as $client) {
            $bills += $client->amount;
        }
        return $bills;
    }

    public function PaidVisits() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
        $paid = 0; 
        foreach ($clients as $client) {
            if ($client->debt == "False"){
                $paid += $client->amount;
            }
        }
        return $paid;
    }

    public function unpaidVisits() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
        $unpa = 0; 
        foreach ($clients as $client) {
            if ($client->debt == "True"){
                $unpa += $client->amount;
            }
        }
        return $unpa;
    }

    public function totalBalance($paid, $unpa, $bills){
   
        $percent = [];

        $porPa = ($paid / $bills) * 100;
        $porUn = ($unpa / $bills) * 100;

        if ($porPa > $porUn){
            $percent = "Positive Balance: " . $porPa;
        }
        else{
            $percent = "Negative Balance: " . $porUn;
        }
        return $percent;
    }

    public function NumberPaidVisits() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
        $numPa = 0;
        foreach ($clients as $client) {
            if ($client->debt == "False"){
                $numPa ++;
            }
        }
        return $numPa;
    }

    public function NumberUnpaidVisits() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
        $numUn = 0;
        foreach ($clients as $client) {
            if ($client->debt == "True"){
                $numUn ++;
            }
        }
        return $numUn;
    }

    public function NumberPatients() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
        $numPatients = 0;
        foreach ($clients as $client) {
           $numPatients ++;
        }
        return $numPatients;
    }

    public function NumberPatientsPaid() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
    
        $paidClients = [];
        $unpaidClients = [];
        $numPatientsPaid = 0;
    
        foreach ($clients as $client) { 
            if ($client->debt == "False") {
                $paidClients[] = $client->patients;
            } else {
                $unpaidClients[] = $client->patients;
            }
        }
    
        foreach ($paidClients as $patient) {
            if (!in_array($patient, $unpaidClients)) {
                $numPatientsPaid++;
            }
        }
    
        return $numPatientsPaid;
    }
    
    

    public function NumberPatientsUnpaid() {
        $cli = new clinic("data.csv");
        $clients = $cli->clientes;
    
        $paidClients = [];
        $unpaidClients = [];
        $numPatientsUnpaid = 0;
    
        foreach ($clients as $client) { 
            if ($client->debt == "True") {
                $unpaidClients[] = $client->patients;
            } else {
                $paidClients[] = $client->patients;
            }
        }
    
        foreach ($unpaidClients as $patient) {
            if (!in_array($patient, $paidClients)) {
                $numPatientsUnpaid++;
            }
        }
    
        return $numPatientsUnpaid;
    }
    

    public function drawList($bills, $paid, $unpa, $percent, $numPa, $numUn, $numPatients, $numPatientsPaid, $numPatientsUnpaid) {
        $html = '<tr>';
        $html .= '<td>' . $bills . "€" . "</td>";
        $html .= '<td>' . $paid . "€" . "</td>";
        $html .= '<td>' . $unpa . "€" . "</td>";
        $html .= '<td>' . $percent . "%" . "</td>";
        $html .= '<td>' . $numPa . "</td>";
        $html .= '<td>' . $numUn . "</td>";
        $html .= '<td>' . $numPatients . "</td>";
        $html .= '<td>' . $numPatientsPaid . "</td>";
        $html .= '<td>' . $numPatientsUnpaid . "</td>";
        $html .= '</tr>';
        
    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '<td colspan="9" style="background-color: #A40808;"><a href="index.php?id="><p><h2>HOME<h2></p></a></td>';
    $html .= '</tr>';
    $html .= '</tfoot>';

    return $html;
    }
}
