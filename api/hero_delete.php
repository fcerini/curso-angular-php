<?php

header("Access-Control-Allow-Origin: *");

include_once "config.php";
include_once "sql_srv.php";

$id = $_SERVER['QUERY_STRING'];

$db = SQLSRV::connect();

$stmt = sqlsrv_query($db,
    "DELETE FROM Heroes
    WHERE id = ?", [$id] );

if($stmt === false) {
    SQLSRV::error(500, 'Error interno del servidor', $db);
}

sqlsrv_fetch($stmt);

sqlsrv_free_stmt($stmt);
SQLSRV::close($db);

echo json_encode([]);

?>