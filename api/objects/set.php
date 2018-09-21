<?php
class Set {

    // conexión a la base de datos y nombre de la tabla
    private $conn;

    // Propiedades del objeto
    //Nombre igualitos a las columnas de la base de datos
    public $v_id_set;
    public $v_juego_id;
    public $v_num_set;
    public $v_pto_equipo1;
    public $v_pto_equipo2;
    public $v_servicio_set;
    public $v_ganador_set;

    //constructor con base de datos como conexión
    public function __construct($db){
        $this->conn = $db;
    }

    // obtener Set por juego ordenado por numero de set DESC
    function readByJuego(){
    
        // select all query
        $query = "SELECT `v_id_set`, `v_juego_id`, `v_num_set`, `v_pto_equipo1`, `v_pto_equipo2`, 
                    `v_servicio_set`, `v_ganador_set` FROM `v_set` 
                    WHERE `v_juego_id` = ".$this->v_juego_id." ORDER BY v_num_set desc";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // insertar set
    function insert(){
    
        // query to insert record
        $query = "INSERT INTO `v_set`(`v_juego_id`, `v_num_set`, `v_pto_equipo1`, `v_pto_equipo2`, `v_servicio_set`,
                     `v_ganador_set`) VALUES (
                        ".$this->v_juego_id.", 
                        ".$this->v_num_set.", 
                        ".$this->v_pto_equipo1.", 
                        ".$this->v_pto_equipo2.", 
                        ".$this->v_servicio_set.", 
                        ".$this->v_ganador_set." )";
        // prepara la sentencia del query
        $stmt = $this->conn->prepare($query);    
        
        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return false;
        }   
        
        
    }

    // actualizar puntos y servicio
    function updatePunto(){
        // query 
        $query = "UPDATE `v_set` SET 
                    `v_pto_equipo1`= ".$this->v_pto_equipo1.",
                    `v_pto_equipo2`= ".$this->v_pto_equipo2.",
                    `v_servicio_set`= ".$this->v_servicio_set."
                    WHERE v_id_set = ".$this->v_id_set;                           

        // prepara la sentencia del query
        $stmt = $this->conn->prepare($query);

        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }       
    }

    // actualizar ganador del SET
    function updateGanador(){
        // query 
        $query = "UPDATE `v_set` SET 
                    `v_ganador_set`= ".$this->v_ganador_set."
                    WHERE v_id_set = ".$this->v_id_set;                           

        // prepara la sentencia del query
        $stmt = $this->conn->prepare($query);

        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }       
    }

}
?>