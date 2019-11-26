<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/empresa.php';

$database = new Database();
$db = $database->getConnection();

$empresa = new Empresa($db);


$stmt = $empresa->read();
$num = $stmt->rowCount();

if($num>0){

    // products array
    $empresa_arr=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $empresa_item=array(
            "idempresa" => $idempresa,
            "titulo" => $titulo,
            "descripcion" => $descripcion,
            "categoria" => $categoria,
            "ubicacion" => $ubicacion,
            "idhorario" => $idhorario,
            "portada"=> $portada, 
            "idgaleria" => $idgaleria
        );

        array_push($empresa_arr, $empresa_item);
    }

    http_response_code(200);

    echo json_encode($empresa_arr);
}
else{

    http_response_code(204);

    echo json_encode(
        array("message" => "No se encontraron empresas")
    );
}