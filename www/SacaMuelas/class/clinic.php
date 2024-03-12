<?php
class clinic{
    public $clientes = [];
    private $fichero;

    public function __construct($fichero){
		$this->fichero = $fichero;
        $this->loadData($fichero);
    }

    public function loadData($fichero)
    {
        $gestor = fopen($fichero, "r");
        while (($element = fgetcsv($gestor)) !== false) {
            array_push(
                $this->clientes, new visit(
                    $element[0],  
                    $element[1],  
                    $element[2], 
                    $element[3], 
                    $element[4],  
                )
            );
        }
        fclose($gestor);
    }


    function drawList(){
        $html = '';
        foreach ($this->clientes as $datos) {
            $html .= '<tr>';
            $html .= '<td>' . $datos->id . "</td>";
            $html .= '<td>' . $datos->patients . "</td>";
            $html .= '<td>' . $datos->date . "</td>";
            $html .= '<td class="';
            if ($datos->amount < 250) {
                $html .= 'vip';
            }
            $html .= '">' . $datos->amount . '</td>';
            $html .= '<td class="';
            if ($datos->debt == "True") {
                $html .= 'no';
            } else {
                $html .= 'si';
            }
            $html .= '">' . $datos->debt . '</td>';

            $html .= '<td><a href="delete.php?id=' . $datos->getId() . '"><img src="img/papelera.png" width="25" height="25"></a></td>';
            $html .= '<td><a href="edit.php?id=' . $datos->getId() . '"><img src="img/edit.png" width="25" height="25"></a></td>';
            $html .= '<td><a href="deleteDebt.php?debt=' . $datos->getDebt() . '"><img src="img/papelera.png" width="25" height="25"></a></td>';
            $html .= '</tr>';
		}
		$html .= '<tfoot>';
		$html .= '<tr>';
		$html .= '<td colspan="7"><p><h2>Add more</h2></p></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td colspan="7" style="background-color: #A40808;"><a href="add.php?id=' . $datos->getId() . '"><img src="img/add.png" width="50"></a></td>';
		$html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="7" style="background-color: #A40808;"><a href="dataPatient.php?id="><p><h2>Patient Information</h2></p></a></td>';
		$html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="7" style="background-color: #A40808;"><a href="indexStatistic.php?id="><p><h2>Statistics</h2></p></a></td>';
		$html .= '</tr>';
		$html .= '</tfoot>';
	
		return $html;
	}

    public function persist()
    {
        $gestor = fopen($this->fichero, "w"); // Abrir el archivo en modo escritura (sobrescribe el contenido)
        foreach ($this->clientes as $datos) {
            fputcsv($gestor, [
                $datos->getPatients(), 
                $datos->getDate(), 
                $datos->getAmount(), 
                $datos->getDebt(),
                $datos->getId(),]);
        }
        fclose($gestor);
    }

    public function delete($id){
        if ($id !== null) {
            for ($i = 0; $i < count($this->clientes); $i++) {
                if ($this->clientes[$i]->getId() == $id) {
                    array_splice($this->clientes, $i, 1);
                }
            } 
            $this->persist();
        }
    }

    #Permite identificar mediante el ID al cliente que queramos modificar, necesario para UPDATE.
    public function getClient($id){
        foreach ($this->clientes as $client){
            if ($client->getId() == $id){
                return $client;
            }
        }
    }
    
    public function update($up){
            foreach ($this->clientes as $client) {
                if ($client->getId() == $up["id"]) {
                    $client->setPatients($up["patients"]);
                    $client->setDate($up["date"]);
                    $client->setAmount($up["amount"]);
                    $client->setDebt($up["debt"]);
                }
            }
            $this->persist();
            return $client;
        }

        
	public function insert($new_Datos){
		$newEmpresa = new visit(
			$new_Datos['patient'],
			$new_Datos['date'],
			$new_Datos['amount'],
			$new_Datos['debt'],
            $new_Datos['id'],   
		);
	
		array_push($this->clientes, $newEmpresa);
	
		$this->persist();
	}

    /*public function paidVisitsClients($de) {
        
        for ($i = 0; $i < count($this->clientes); $i++) {
            if ($this->clientes[$i]->getDebt() == "False") {
                array_splice($this->clientes, $i, 1);
            }
        } 
        $this->persist();
    }*/
}



