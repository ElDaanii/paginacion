<?php
class patient{
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
                $this->clientes, new patient_data(
                    $element[0], 
                    $element[1], 
                    $element[2],  
                )
            );
        }
        fclose($gestor);
    }


    function drawListPatient(){
        $html = '';
        foreach ($this->clientes as $datos) {
            $html .= '<tr>';
            $html .= '<td>' . $datos->id . "</td>";
            $html .= '<td><a href="infoPatient.php?name=' . $datos->getName() . '">' . $datos->name . '</a></td>';
            $html .= '<td>' . $datos->address . "</td>";
            
            $html .= '<td><a href="deletePatient.php?id=' . $datos->getId() . '"><img src="img/papelera.png" width="25" height="25"></a></td>';
            $html .= '<td><a href="editPatient.php?id=' . $datos->getId() . '"><img src="img/edit.png" width="25" height="25"></a></td>';
            $html .= '</tr>';
		}
		$html .= '<tfoot>';
		$html .= '<tr>';
		$html .= '<td colspan="7"><p><h2>Add more</h2></p></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '<td colspan="7" style="background-color: #A40808;"><a href="addPatient.php?id=' . $datos->getId() . '"><img src="img/add.png" width="50"></a></td>';
		$html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="7" style="background-color: #A40808;"><a href="index.php?id="><p><h2>HOME</h2></p></a></td>';
        $html .= '</tr>';
        $html .= '<tr>';
        $html .= '<td colspan="7" style="background-color: #A40808;"><a href="dataPatient.php?id="><p><h2>Patients</h2></p></a></td>';
        $html .= '</tr>';
		$html .= '</tfoot>';
	
		return $html;
	}

    public function persist()
    {
        $gestor = fopen($this->fichero, "w"); // Abrir el archivo en modo escritura (sobrescribe el contenido)
        foreach ($this->clientes as $datos) {
            fputcsv($gestor, [
                $datos->getId(), 
                $datos->getName(), 
                $datos->getAddress()]);
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

    public function getClient($id){
        foreach ($this->clientes as $client){
            if ($client->getId() == $id){
                return $client;
            }
        }
    }
    
    public function update($patient){
            foreach ($this->clientes as $client) {
                if ($client->getId() == $patient["id"]) {
                    $client->setName($patient["name"]);
                    $client->setAddress($patient["address"]);
                }
            }
            $this->persist();
            return $client;
        }

        
	public function insert($new_Datos){
		$newEmpresa = new patient_data(
			$new_Datos['id'],
			$new_Datos['name'],
			$new_Datos['address']  
		);
	
		array_push($this->clientes, $newEmpresa);
		$this->persist();
	}

    public function showPatient($na){
        $show = [];
        foreach($this->clientes as $datos){
            if ($datos->getName() == $na) {
                $show[] = $datos;
            }
        }
        $this->clientes = $show;
        $this->persist();
    }
    
}