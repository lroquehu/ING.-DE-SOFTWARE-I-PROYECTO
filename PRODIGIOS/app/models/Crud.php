<?php
require_once ROOT . 'config/database.php';

class Crud {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function insertar($tabla,$columna,$data) {
        $stmt = $this->db->prepare("INSERT INTO $tabla ($columna) VALUES($data)");
        $stmt->execute();
    }
    public function mostrarTabla($table){

        $stmt = $this->db->prepare("SELECT * FROM $table");
        $stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_merge($result);
	}
    public function mostrarFila($tabla,$condicion){
        $stmt = $this->db->prepare("SELECT * FROM $tabla WHERE $condicion");
        $stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_merge($result);
    }
    public function actualizar($tabla,$data,$condicion){
		$stmt = $this->db->prepare("UPDATE $tabla SET $data WHERE $condicion");
        $stmt->execute();
    
	}
    public function eliminar($tabla,$condicion){
        $stmt = $this->db->prepare("DELETE FROM $tabla WHERE $condicion");
        $stmt->execute();

	}
}