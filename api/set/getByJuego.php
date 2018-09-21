<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// incluye la configuración de la base de datos y la conexión
include_once '../config/database.php';
include_once '../objects/set.php';
 
// inicia la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
 
// inicia el objeto
$set = new Set($db);

$data = json_decode(file_get_contents('php://input'), true);

$info = array($data);

$set->v_juego_id= $info[0]["v_juego_id"];
// query de lectura
$stmt = $set->readByJuego();
$num = $stmt->rowCount();

//set array
$set_arr=array();
$set_arr["data"]=array();
 
// check if more than 0 record found
if($num>0){ 
    
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
                    
        //Los nombres acá son iguales a los de la clase iguales a las columnas de la BD
        $set_item=array(
            "v_id_set"=>$v_id_set, 
            "v_juego_id"=>$v_juego_id, 
            "v_num_set"=>$v_num_set, 
            "v_pto_equipo1"=>$v_pto_equipo1, 
            "v_pto_equipo2"=>$v_pto_equipo2, 
            "v_servicio_set"=>$v_servicio_set, 
            "v_ganador_set"=>$v_ganador_set
        );
 
        array_push($set_arr["data"], $set_item);
    }
 
    echo json_encode($set_arr);
}
 
else{
    echo json_encode($set_arr);
}
?>