<?php
include_once '../functions/bd_conexion.php';
header("Content-Type: application/json; charset=UTF-8");
$conn->set_charset("utf8");

$result = $conn->query("SELECT idUser, (select name from area where idArea = _idArea) as area, name, lastName, user, rol FROM user where state = 0");
$outp = array();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>