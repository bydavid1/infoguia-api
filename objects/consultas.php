<?php
class Consultas
{
// database connection and table name
    private $conn;
    private $table_name = "consultas";

    // object properties
    public $idconsulta;
    public $fecha;
    public $hora;
    public $nombres;
    public $apellidos;
    public $num_Consultorio;
    public $idpaciente;
    public $idempleado;


// constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }



    function read()
    {
    // select all query
    $query = "SELECT
                idconsulta, fecha, hora, nombres, apellidos, num_Consultorio
            FROM
                " . $this->table_name . " WHERE idempleado = ?";
    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // execute query
    $stmt->bindParam(1, $this->idempleado);
    $stmt->execute();
    return $stmt;
    }

    function create()
    {
    $query = "INSERT INTO " . $this->table_name . "
            SET 
            fecha=:fecha,
            hora=:hora,
            nombres=:nombres,
            apellidos=:apellidos,
            num_Consultorio=:num_Consultorio, 
            idpaciente=:idpaciente,
            idempleado=:idempleado";
            
    $stmt = $this->conn->prepare($query);

    // bind values
    $stmt->bindParam(":fecha", $this->fecha);
    $stmt->bindParam(":hora", $this->hora);
    $stmt->bindParam(":nombres", $this->nombres);
    $stmt->bindParam(":apellidos", $this->apellidos);
    $stmt->bindParam(":num_Consultorio", $this->num_Consultorio);
    $stmt->bindParam(":idpaciente", $this->idpaciente);
    $stmt->bindParam(":idempleado", $this->idempleado);
    // execute query
    if($stmt->execute())
    {
        return true;
    }

    return false;

    }

// update the product
    function update()
    {

    // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
            nombres=:nombres,
            apellidos=:apellidos,
            num_Paciente=:num_Paciente, 
            num_Consultorio=:num_Consultorio
            WHERE
            idconsulta=:idconsulta";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // bind new values
    $stmt->bindParam(":nombres", $this->nombres);
    $stmt->bindParam(":apellidos", $this->apellidos);
    $stmt->bindParam(":num_Paciente", $this->num_Paciente);
    $stmt->bindParam(":apellido_Paciente", $this->apellido_Paciente);
    $stmt->bindParam(":num_Consultorio", $this->num_Consultorio);
    $stmt->bindParam(":idconsulta", $this->idconsulta);    
    // execute the query
    if($stmt->execute())
    {
        return true;
    }
    return false;
    }

// delete the product
    function delete()
    {

    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE idconsulta = ?";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // bind id of record to delete
    $stmt->bindParam(1, $this->idcita);

    // execute query
    if($stmt->execute())
    {
        return true;
    }
    return false;

    }


    function readOne()
    {

                    // query to read single record
        $query = "SELECT
        idconsulta, fecha, hora, nombres, apellidos, num_Consultorio
    FROM
        " . $this->table_name ." 
    WHERE
    idconsulta = ?
    LIMIT
        0,1";

// prepare query statement
$stmt = $this->conn->prepare( $query );

// bind id of product to be updated
$stmt->bindParam(1, $this->idconsulta);

// execute query
$stmt->execute();

// get retrieved row
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// set values to object properties
$this->fecha = $row['fecha'];
$this->hora = $row['hora'];
$this->nombres = $row['nombres'];
$this->apellidos = $row['apellidos'];
$this->num_Consultorio = $row['num_Consultorio'];
$this->nom_Doctor = $row['nom_Doctor'];

    }


    function custom_read()
    {
        $query = "SELECT
                    idconsulta, fecha, hora, nombres, apellidos, num_Consultorio
                FROM
                    " . $this->table_name ." 
                WHERE
                idpaciente = ?";
   // prepare query statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->idpaciente);
   // execute query
    $stmt->execute();
    return $stmt;
    }

    function readById()
    {
        $query = "SELECT
                    idconsulta, fecha, hora, nombres, apellidos, num_Consultorio, nom_Doctor
                FROM
                    " . $this->table_name ." 
                WHERE
                idempleado = ?";
   // prepare query statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->idempleado);
   // execute query
    $stmt->execute();
    return $stmt;
    }

    function CountConsult()
    {
    // select all query
    $query = "SELECT
            COUNT(*) total
            FROM
                " . $this->table_name ."
            WHERE
            fecha = CURRENT_DATE ";
    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // execute query
    $stmt->execute();

    return $stmt;
    }



}