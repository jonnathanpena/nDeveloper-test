<?php
class Juego {

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

    // insertar juego
    function insert(){
    
        // query to insert record
        $query = "INSERT INTO `v_juego`(`v_equipo1_juego`, `v_equipo2_juego`) VALUES
                        ".$this->v_equipo1_juego.",
                        ".$this->v_equipo2_juego.")";
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