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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $clave = MD5($_POST['clave']);
    $rol = $_POST['rol']; // Agregado el campo de rol

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND clave = ? AND rol = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario, $clave, $rol]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['rol'] = $user['rol']; // Guarda el rol del usuario en la sesión
        header('Location: admin/pages-admin.php');
    } else {
        $errMsg = 'Usuario, contraseña o rol incorrectos';
    }
}
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
        border: 2px solid #2b3d6b; /* Asegúrate de que el borde del botón coincida con el del input */
        border-left: none; /* Eliminar el borde izquierdo para que se vea más limpio */
        width: 100%;
    }
    #eye:hover {
        background-color: #2b3d6b;
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
                    <h4 class="login-panel-title">Sistema Escolar Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</h4>
                    <br>
                    <?php
                    if (isset($errMsg)){
                        echo '<div class="alert alert-danger">'.$errMsg.'</div>'; 
                    }
                    ?>
                    <div class="login-panel-section">
                        <div class="form-group">
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                <input class="form-control" name="usuario" value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'] ?>" autocomplete="off" type="text" placeholder="Nombre del usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                <input class="form-control" name="clave" type="password" placeholder="Contraseña" id="input" maxlength=20>
                                <span class="input-group-btn">
                                    <button type="button" id="eye" class="btn btn-default">
                                        <img src="../Assets/img/eye.svg" alt="">
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- Campo de Rol -->
                        <div class="form-group">
                            <label for="rol">Permisos</label>
                            <select class="form-control" required name="rol">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Docente</option>
                            </select>
                        </div>
                        <div class="login-panel-section">
                            <div class="g-recaptcha" data-sitekey="6LfpgXQqAAAAAGlekry9y252igQn96F6KWz7AA1D"></div>
                        </div>
                        <div class="login-panel-section">
                            <button type="submit" name='login' class="btn btn-default"><i class="fa fa-sign-in fa-fw" aria-hidden="true"></i> Iniciar sesión</button>
                        </div>
                        <br>
                        <a href="registerUsers.php" class="btn-regresar">Registrar nuevo usuario</a>
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
