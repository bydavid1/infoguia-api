<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// database connection will be here
// include database and object files
include_once '../config/database.php';
include_once '../objects/consultas.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$empresa = new Empresa($db);

$empresa->idempresa = isset($_GET['idempresa']) ? $_GET['idempresa'] : die();

$stmt = $empresa->readDetails();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){

    $consulta_arr=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $consulta_item=array(
            "idempresa" => $idempresa,
            "correo" => $correo,
            "website" => $website,
            "telefonos" => $telefonos,
            "direccion" => $direccion
        );

        array_push($consulta_arr, $consulta_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($consulta_arr);
}
else{

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "Not found.")
    );
}

// no products found will be here