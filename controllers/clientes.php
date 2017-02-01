<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 30/1/2017
 * Time: 9:56 PM
 */

require_once '../database/dbclass.php';

function getClientes(){

    $con = new mysql();

    $result = $con->json_query('SELECT * FROM cliente');

    return $result;
}
