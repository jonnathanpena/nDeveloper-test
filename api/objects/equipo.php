<?php
class Equipo {

    // conexión a la base de datos y nombre de la tabla
    private $conn;

    // Propiedades del objeto
    //Nombre igualitos a las columnas de la base de datos
    public $v_id_equipo;
    public $v_nom_equipo;

    //constructor con base de datos como conexión
    public function __construct($db){
        $this->conn = $db;
    }

    // obtener equipo por nombre
    function readByName(){
    
        // select all query
        $query = "SELECT `v_id_equipo`, `v_nom_equipo` FROM `v_equipo` 
                    WHERE v_nom_equipo = '".$this->v_nom_equipo."'";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // obtener equipo por id
    function readById(){
    
        // select one query
        $query = "SELECT `v_id_equipo`, `v_nom_equipo` FROM `v_equipo` 
                    WHERE v_id_equipo =".$this->v_id_equipo;
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // insertar equipo
    function insert(){
    
        // query to insert record
        $query = "INSERT INTO `v_equipo`(`v_nom_equipo`) VALUES  (
                        '".$this->v_nom_equipo."')";
        // prepara la sentencia del query
        $stmt = $this->conn->prepare($query);    
        
        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return false;
        }   
        
        
    }
}
?>