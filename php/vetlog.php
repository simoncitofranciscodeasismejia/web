
<?php
require '../Config/Config.php';

if (isset($_POST['login'])) {
    $errMsg = '';

    // Obtener datos del FORMULARIO
    $usuario = trim($_POST['usuario']);
    $clave = MD5(trim($_POST['clave']));
    $rolSeleccionado = $_POST['rol']; // Rol seleccionado en el formulario

    if ($usuario == '') {
        $errMsg .= 'Digite su usuario. ';
    }
    if ($clave == '') {
        $errMsg .= 'Digite su contraseña. ';
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6LfpgXQqAAAAAGLvJZTFWSytG1ELFD78TxJeqiuY";
    $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
    $atributos = json_decode($respuesta, TRUE);

    if (!$atributos['success']) {
        $errMsg .= "Verificar captcha. ";
    }

    if($rolSeleccionado == 1){
        if (empty($errMsg)) {
            try {
                $stmt = $connect->prepare('SELECT id, usuario, nombre, correo, clave, rol FROM usuarios WHERE usuario = :usuario');
                $stmt->execute(array(':usuario' => $usuario));
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($data === false) {
                    $errMsg .= "Usuario $usuario no encontrado. ";
                } else {
                    if ($clave === $data['clave']) {
                        if ($data['rol'] == $rolSeleccionado) { // Verificar si el rol seleccionado coincide con el rol del usuario
                            $_SESSION['id'] = $data['id'];
                            $_SESSION['nombre'] = $data['nombre'];
                            $_SESSION['usuario'] = $data['usuario'];
                            $_SESSION['correo'] = $data['correo'];
                            $_SESSION['rol'] = $data['rol'];
    
                            if ($_SESSION['rol'] == 1) {
                                header('Location: admin/pages-admin.php');
                            } else {
                                echo 'Location: docente-admin/pages-docente.php';
                            }
                            exit;
                        } else {
                            $errMsg .= 'Rol seleccionado incorrecto.';
                        }
                    } else {
                        $errMsg .= 'Contraseña incorrecta. ';
                    }
                }
            } catch (PDOException $e) {
                $errMsg .= 'Error: ' . $e->getMessage();
            }
        }
    } elseif ($rolSeleccionado == 2){
        if (empty($errMsg)) {
            try {
                $stmt = $connect->prepare('SELECT idtea, usuario, nomte, correo, clave, dnite, rol FROM teachers WHERE usuario = :usuario');
                $stmt->execute(array(':usuario' => $usuario));
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if ($data === false) {
                    $errMsg .= "Usuario $usuario no encontrado. ";
                } else {
                    if ($clave === $data['clave']) {
                        if ($data['rol'] == $rolSeleccionado) { // Verificar si el rol seleccionado coincide con el rol del usuario
                            $_SESSION['id'] = $data['idtea'];
                            $_SESSION['dnite'] = $data['dnite'];
                            $_SESSION['nombre'] = $data['nomte'];
                            $_SESSION['usuario'] = $data['usuario'];
                            $_SESSION['correo'] = $data['correo'];
                            $_SESSION['rol'] = $data['rol'];
                            // $_SESSION['rol'] = $data['rol'];
    
                            if ($_SESSION['rol'] == 2) {
                                header('Location: ../views/docente-admin/pages-docente.php');
                            } else {
                                echo 'no se pudo iniciar sesion';
                            }
                            exit;
                        } else {
                            $errMsg .= 'Rol seleccionado incorrecto.';
                        }
                    } else {
                        $errMsg .= 'Contraseña incorrecta. ';
                    }
                }
            } catch (PDOException $e) {
                $errMsg .= 'Error: ' . $e->getMessage();
            }
        }
    }

    // if (empty($errMsg)) {
    //     try {
    //         $stmt = $connect->prepare('SELECT id, usuario, nombre, correo, clave, rol FROM usuarios WHERE usuario = :usuario');
    //         $stmt->execute(array(':usuario' => $usuario));
    //         $data = $stmt->fetch(PDO::FETCH_ASSOC);

    //         if ($data === false) {
    //             $errMsg .= "Usuario $usuario no encontrado. ";
    //         } else {
    //             if ($clave === $data['clave']) {
    //                 if ($data['rol'] == $rolSeleccionado) { // Verificar si el rol seleccionado coincide con el rol del usuario
    //                     $_SESSION['id'] = $data['id'];
    //                     $_SESSION['nombre'] = $data['nombre'];
    //                     $_SESSION['usuario'] = $data['usuario'];
    //                     $_SESSION['correo'] = $data['correo'];
    //                     $_SESSION['rol'] = $data['rol'];

    //                     if ($_SESSION['rol'] == 1) {
    //                         header('Location: admin/pages-admin.php');
    //                     } else if ($_SESSION['rol'] == 2) {
    //                         header('Location: docente-admin/pages-docente.php');
    //                     }
    //                     exit;
    //                 } else {
    //                     $errMsg .= 'Rol seleccionado incorrecto.';
    //                 }
    //             } else {
    //                 $errMsg .= 'Contraseña incorrecta. ';
    //             }
    //         }
    //     } catch (PDOException $e) {
    //         $errMsg .= 'Error: ' . $e->getMessage();
    //     }
    // }
}
?>
