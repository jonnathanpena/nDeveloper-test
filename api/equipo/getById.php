<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// incluye la configuración de la base de datos y la conexión
include_once '../config/database.php';
include_once '../objects/equipo.php';
 
// inicia la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
 
// inicia el objeto
$equipo = new Equipo($db);

$data = json_decode(file_get_contents('php://input'), true);

$info = array($data);

$equipo->v_id_equipo= $info[0]["v_id_equipo"];
// query de lectura
$stmt = $equipo->readById();
$num = $stmt->rowCount();

//equipo array
$equipo_arr=array();
$equipo_arr["data"]=array();
 
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
        $equipo_item=array(
            "v_id_equipo"=>$v_id_equipo, 
            "v_nom_equipo"=>$v_nom_equipo
        );
 
        array_push($equipo_arr["data"], $equipo_item);
    }
 
    echo json_encode($equipo_arr);
}
 
else{
    echo json_encode($equipo_arr);
}
?>