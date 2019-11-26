<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/consultas.php';

$database = new Database();
$db = $database->getConnection();

$consulta = new Consultas($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if  (
    !empty($data->fecha) &&
    !empty($data->hora) &&
    !empty($data->nombres) &&
    !empty($data->apellidos) &&
    !empty($data->num_Consultorio) &&
    !empty($data->idempleado) &&
    !empty($data->idpaciente)
    )
{

    $consulta->fecha = $data->fecha;
    $consulta->hora = $data->hora;
    $consulta->nombres = $data->nombres;
    $consulta->apellidos = $data->apellidos;
    $consulta->num_Consultorio = $data->num_Consultorio;
    $consulta->idempleado = $data->idempleado;
    $consulta->idpaciente = $data->idpaciente;

    if($consulta->create())
    {
        $id = $db->lastInsertId();
        

        // set response code - 201 created
        http_response_code(201);
        // tell the user
        echo json_encode($id);
    }
    // if unable to create the product, tell the user
    else
    {
        // set response code - 503 service unavailable
        http_response_code(503);
        // tell the user
        echo json_encode(array("message" => "Unable to create quotes."));
    }
}

// tell the user data is incomplete
    else
    {
    // set response code - 400 bad request
    http_response_code(400);
    // tell the user
    echo json_encode(array("message" => "Unable to create quote. Data is incomplete."));
    }
?>