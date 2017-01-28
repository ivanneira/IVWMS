<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 27/1/2017
 * Time: 10:05 PM
 */

require_once '../database/dbclass.php';

function getData(){

    $con = new mysql();

    $result = $con->json_query('SELECT * FROM cuentadigital');

    return $result;
}

class pagos{

    public $ID;
    public $Fecha;
    public $Referencia;
    public $Codigo;
    public $Bruto;
    public $Costo;
    public $Neto;

    public function __construct(){

    }
}
