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
 
// get posted data
$data = json_decode(file_get_contents('php://input'), true);

$info = array($data);

// configura los valores recibidos en post de la app
$set->v_juego_id= $info[0]["v_juego_id"];
$set->v_num_set= $info[0]["v_num_set"];
$set->v_pto_equipo1= $info[0]["v_pto_equipo1"];
$set->v_pto_equipo2= $info[0]["v_pto_equipo2"];
$set->v_servicio_set= $info[0]["v_servicio_set"];
$set->v_ganador_set= $info[0]["v_ganador_set"];

// insert set
$response = $set->insert();
if($response != false){
    $response = $response * 1;
    echo json_encode($response); 
}else{
    // Error en caso de que no se pueda modificar
    echo json_encode(false); 
}
?>