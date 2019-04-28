<?php

if (isset($_POST['ingresar'])) {
    $usuario = $_POST['username'];
    $password = $_POST['password'];

    //die(json_encode($_POST));

    try {
        include_once '../functions/bd_conexion.php';
        $stmt = $conn->prepare("SELECT idUser, _idArea, name, lastName, user, passWord, rol, state FROM user WHERE user = ?;");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_log, $id_area, $firstName_log, $lastName_log, $userName_log, $pass_log, $rol_log, $state_log);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                if (password_verify($password, $pass_log) && !$state_log) {
                    session_start();
                    $_SESSION['idusuario'] = $id_log;
                    $_SESSION['area'] = $id_area;
                    $_SESSION['usuario'] = $userName_log;
                    $_SESSION['nombre'] = $firstName_log . ' ' . $lastName_log;
                    $_SESSION['rol'] = $rol_log;
                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'usuario' => $firstName_log,
                        'permiso' => $rol_log,
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error',
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'error',
                );
            }
        } /*else {
        $respuesta = array(
        'respuesta' => 'error_select'
        );
        }*/
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo 'Error: ' . $e . getMessage();
    }

    die(json_encode($respuesta));
}