<?php
session_start();
if (isset($_SESSION['id'])){
    header('Location: admin/pages-admin.php');
}
include_once '../Assets/php/vetlog.php';

// Datos de conexión a la base de datos
$host = 'localhost';
$db = 'sistema_escolar';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Conexión fallida: ' . $e->getMessage();
}

$successMsg = ''; // Variable para el mensaje de éxito

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['registro'])) {
        $usuario = $_POST['usuario'];
        $dnite = $_POST['dnite'];
        $genero = $_POST['genero'];
        $telefono = $_POST['prefijo'] . $_POST['telefono'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];

        $errMSG = ""; // Variable para mensajes de error

        // Validaciones
        if (empty($usuario)) {
            $errMSG = "Por favor, ingrese su usuario.";
        } elseif (empty($dnite)) {
            $errMSG = "Por favor, ingrese su cédula de identidad.";
        } elseif (empty($genero)) {
            $errMSG = "Por favor, ingrese su género.";
        } elseif (empty($telefono) || !preg_match("/^\d{11}$/", $telefono)) {
            $errMSG = "Por favor, ingrese un número de teléfono válido.";
        } elseif (empty($nombre)) {
            $errMSG = "Por favor, ingrese su nombre.";
        } elseif (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errMSG = "Por favor, ingrese un correo electrónico válido.";
        } elseif (empty($clave)) {
            $errMSG = "Por favor, ingrese su clave.";
        } elseif (strlen($clave) < 8 || strlen($clave) > 24) {
            $errMSG = "La clave debe tener entre 8 y 24 caracteres.";
        } else {
            // Verificar si el usuario ya existe
            $checkUser = "SELECT * FROM teachers WHERE usuario = :usuario";
            $stmtCheck = $pdo->prepare($checkUser);
            $stmtCheck->bindParam(':usuario', $usuario);
            $stmtCheck->execute();

            if ($stmtCheck->rowCount() > 0) {
                $errMSG = "El usuario ya existe. Por favor, elija otro.";
            }
        }

        // Si hay errores, mostrarlos
        if (!empty($errMSG)) {
            echo $errMSG;
        } else {
            // Encriptar la clave
            $clave = MD5($clave);
            
            // Inserción en la base de datos
            $sql = "INSERT INTO teachers (usuario, dnite, sexte, telet, nomte, correo, clave, rol) VALUES (:usuario, :dnite, :genero, :telefono, :nombre, :correo, :clave, 2)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':dnite', $dnite);
            $stmt->bindParam(':genero', $genero);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':clave', $clave);

            if ($stmt->execute()) {
                $successMsg = '¡Nuevo usuario registrado con éxito!';
                header('refresh:2;url=home.php'); // Redirigir a la página de inicio de sesión después de 2 segundos
            } else {
                echo "Error al registrar el usuario.";
            }
        }
    }
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    <link href="../Assets/css/awesome-bootstrap-checkbox.min.css" rel="stylesheet">
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Assets/css/estilos.css" rel="stylesheet">
    <link href="../Assets/css/font-awesome.min.css" rel="stylesheet">
    <style>
    body {
        background-image: url('../Assets/img/escuela2.jpeg');
        background-repeat: no-repeat;
        background-position: bottom center;
        background-size: cover;
        text-align: center;
    }
    .input-group .input-group-btn .btn {
        height: 100%; /* Asegura que el botón tenga la misma altura que el input */
        border: 1px solid #2b3d6b; /* Asegúrate de que el borde del botón coincida con el del input */
        border-left: none; /* Eliminar el borde izquierdo para que se vea más limpio */
        width: 100%;
    }
    #eye:hover {
        background-color: #2b3d6b;
    }
    .success-message {
        color: #006400;
        background-color: #90EE90;
        text-align: center;
        font-size: 20px;
        padding: 10px;
        border-radius: 2px;
    }

    </style>
    <link rel="icon" type="image/jpg" sizes="96x96" href="../Assets/img/logo_nuevo.jpg">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-centered">
            <div class="login-panel">
                <form method="POST" autocomplete="off" role="form">
                    <h4 class="login-panel-title">Registro de nuevo usuario</h4>
                    <?php
                    if (isset($errMsg)){
                        echo '<div style="color:#FF0000;text-align:center;font-size:20px;">'.$errMsg.'</div>';
                    }
                    if ($successMsg) {
                        echo '<div class="success-message">'.$successMsg.'</div>';
                    }
                    ?>
                    <div class="login-panel-section">
                        <div class="form-group">
                                <input class="form-control" name="usuario" value="<?php if (isset($_POST['usuario'])) echo $_POST['usuario']; ?>" autocomplete="off" required type="text" placeholder="Nombre del usuario">
                        </div>
                        <div class="form-group">
                                <input class="form-control" name="dnite" value="<?php if (isset($_POST['dnite'])) echo $_POST['dnite']; ?>" autocomplete="off" required type="text" placeholder="Cedula" maxlength=8>
                        
                        </div>
                
                        <div class="form-group">
                                <input class="form-control" name="nombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre']; ?>" autocomplete="off" required type="text" placeholder="Nombre y Apellido">
                        
                        </div>

                        <div class="form-group">
                                <input class="form-control" name="correo" value="<?php if (isset($_POST['correo'])) echo $_POST['correo']; ?>" autocomplete="off" required type="email" placeholder="Correo electrónico">
                        
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="clave" required type="password" placeholder="Contraseña" id="input" maxlength=24 minlenght=8>
                                <span class="input-group-btn">
                                    <button type="button" id="eye" class="btn btn-default">
                                        <img src="../Assets/img/eye.svg" alt="">
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- Campo de Permisos -->
                        <div class="form-group">
                                <select class="form-control" name="genero" value="<?php if (isset($_POST['genero'])) echo $_POST['genero']; ?>" required type="text">

                                <option value="" class="form-control" disabled selected>Seleccione el genero</option>
                                <option value="masculino" class="form-control">Masculino</option>
                                <option value="femenino" class="form-control">Femenino</option>

                                </select>
                        
                        </div>
                        <div class="form-group">
                                <select name="prefijo" class="form-control" id="prefijo">
                                    <option value="" class="form-control" disabled selected>Selecciona prefijo</option>
                                    <option value="0412" class="form-control">0412</option>
                                    <option value="0414" class="form-control">0414</option>
                                    <option value="0416" class="form-control">0416</option>
                                    <option value="0424" class="form-control">0424</option>
                                    <option value="0426" class="form-control">0426</option>
                                </select>
                                <br>
                                <input class="form-control" name="telefono" value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>" autocomplete="off" required type="text" placeholder="Telefono celular" maxlength=7>
                        
                        </div>
                        <!-- <div class="form-group">
                            <select class="form-control" required name="txtperm">
                                <option selected disabled>Seleccione el permiso</option>
                                <option value="1">Administrador</option>
                                <option value="2">Docente</option>
                            </select>
                        </div> -->

                        <div class="g-recaptcha" data-sitekey="6LfpgXQqAAAAAGlekry9y252igQn96F6KWz7AA1D"></div>
                        <div class="login-panel-section">
                            <button type="submit" name="registro" class="btn btn-default"><i class="fa fa-sign-in fa-fw" aria-hidden="true"></i>Registrar nuevo usuario</button>
                        </div>
                        <br>
                        <a href="home.php" class="btn-regresar">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../Assets/js/jquery.min.js"></script>
<script src="../Assets/js/bootstrap.min.js"></script>
<script>
var eye = document.getElementById('eye');
var input = document.getElementById('input');
eye.addEventListener("click", function() {
    if (input.type === "password") {
        input.type = "text";
        eye.setAttribute("fill", "currentColor");
    } else {
        input.type = "password";
        eye.setAttribute("fill", "none");
    }
});
</script>
</body>
</html>
