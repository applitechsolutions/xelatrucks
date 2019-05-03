<?php
include_once '../functions/bd_conexion.php';

if ($_POST['usuario'] == 'nuevo') {

    $firstName = $_POST['nombre'];
    $lastName = $_POST['apellido'];
    $userName = $_POST['user'];
    $passWord = $_POST['passW'];
    $permissions = $_POST['rdGroup1'];
    $area = $_POST['area'];
    $pass_hashed = password_hash($passWord, PASSWORD_BCRYPT);

    try {
        if ($firstName == '' or $lastName == '' or $userName == '' or $passWord == '' or $permissions == '' or $area == '') {
            $respuesta = array(
                'respuesta' => 'vacio',
            );
        } else {
            $stmt = $conn->prepare("INSERT INTO user (_idArea, name, lastName, user, passWord, rol) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssi", $area, $firstName, $lastName, $userName, $pass_hashed, $permissions);
            $stmt->execute();
            $id_registro = $stmt->insert_id;
            if ($id_registro > 0) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'idUsuario' => $id_registro,
                    'mensaje' => 'Usuario creado correctamente!',
                    'proceso' => 'nuevo',
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'idUsuario' => $id_registro,
                );
            }
            $stmt->close();
            $conn->close();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e . getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST['usuario'] == 'editar') {

    $idUser = $_POST['idUser'];
    $firstName = $_POST['nombre'];
    $lastName = $_POST['apellido'];
    $userName = $_POST['user'];
    $permissions = $_POST['rdGroup1'];
    $area = $_POST['area'];

    try {
        if ($firstName == '' or $userName == '' or $permissions == '' or $area == '') {
            $respuesta = array(
                'respuesta' => 'vacio',
            );
        } else {
            $stmt = $conn->prepare("UPDATE user SET _idArea = ?, name = ?, lastName = ?, user = ?, rol = ? WHERE idUser = ?");
            $stmt->bind_param("isssii", $area, $firstName, $lastName, $userName, $permissions, $idUser);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'idUsuario' => $stmt->insert_id,
                    'mensaje' => 'Usuario Editado correctamente!',
                    'proceso' => 'editado',
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                    'idUsuario' => $id_registro,
                );
            }
            $stmt->close();
            $conn->close();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e . getMessage();
    }
    die(json_encode($respuesta));
}

if ($_POST['usuario'] == 'eliminar') {

    $idUser = $_POST['id'];

    try {
        if ($idUser == '') {
            $respuesta = array(
                'respuesta' => 'vacio',
            );
        } else {
            $stmt = $conn->prepare("UPDATE user SET state = 1 WHERE idUser = ?");
            $stmt->bind_param("i", $idUser);
            $stmt->execute();
            if ($stmt->affected_rows) {
                $respuesta = array(
                    'respuesta' => 'exito',
                    'idUsuario' => $idUser,
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                );
            }
            $stmt->close();
            $conn->close();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e . getMessage();
    }
    die(json_encode($respuesta));
}
?>