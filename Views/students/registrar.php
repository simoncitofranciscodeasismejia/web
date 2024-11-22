<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../home.php');
    exit; // Asegúrate de salir después de redirigir
}
?>
<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'sistema_escolar';
$username = 'root';
$password = '';

try {
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Obtener datos de la tabla degree
$query = "SELECT iddeg, nomgra FROM degree";
$stmt = $connect->prepare($query);
$stmt->execute();
$degrees = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query1 = "SELECT idper, nomperi FROM period";
$stmt1 = $connect->prepare($query1);
$stmt1->execute();
$degrees1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

$query2 = "SELECT dnifa, nomfa, apellido, profefa, correo, telefa, direc, foto FROM fathers";
$stmt2 = $connect->prepare($query2);
$stmt2->execute();
$degrees2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$query3 = "SELECT * FROM seccion";
$stmt3 = $connect->prepare($query3);
$stmt3->execute();
$seccion = $stmt3->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alumnos | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
    <link rel="stylesheet" href="../../Assets/css/custom.css">
    <link rel="stylesheet" href="../../Assets/css/registrar.css">
    <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
    
    <style type="text/css">
        .hideMe {
            display: none;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="body-overlay"></div>

    <!-- Page Content -->
    <div id="content">
        <div class="top-navbar">
            <div class="xp-topbar">
                <div class="row">
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Buscar...">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
                            <nav class="navbar p-0">
                                <ul class="nav navbar-nav flex-row ml-auto">   
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" data-toggle="dropdown">
                                            <img src="../../Assets/img/user.png" style="width:40px; border-radius:50%;" />
                                        </a>
                                        <ul class="dropdown-menu small-menu">
                                            <li>
                                                <a href="../profile/mostrar.php">
                                                    <span class="material-icons">person_outline</span>Perfil
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../pages-logout.php">
                                                    <span class="material-icons">logout</span>Cerrar sesión
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>  
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                </ol>                
            </div>
        </div>

        <div class="">
            <h1>Inscripción de estudiantes</h1>
            <br>
            <div class="row" style="margin: 10px">

                <div class="form col">
                    <form class="general" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-6">
                                <h4>Datos del estudiante</h4>
                                <div class="row">
                                    <div class="col">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text" id="apellidos" name="apellidos" class="form-control" autocomplete="off" >
                                    </div>
                                    <div class="col">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" id="nombres" name="nombres" class="form-control" autocomplete="off" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="cedEsc">Cédula escolar</label>
                                        <input type="text" id="cedEsc" name="cedEsc" class="form-control" autocomplete="off" >
                                    </div>  
                                    <div class="col">
                                        <label for="fechaNac">Fecha de nacimiento</label>
                                        <input type="date" min="<?php echo date('Y-m-d', strtotime('-6 years')); ?>" max="<?php echo date('Y-m-d', strtotime('-3 years')); ?>" ma,id="fechaNacEst" name="fechaNacEst" class="form-control" >
                                    </div>
                                    <div class="col">
                                        <label for="lugarNac">Lugar de nacimiento</label>
                                        <input type="text" id="lugarNacEst" name="lugarNacEst" class="form-control" autocomplete="off" >
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="lugarViv">Direccion de vivienda</label>
                                        <input type="text" id="lugarVivEst" name="lugarVivEst" class="form-control" autocomplete="off" >
                                    </div>                                       
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="genero">Genero</label>
                                        <select  name="genero" class="form-control">
                                            <option value="seleccionar" selected disabled>Seleccionar</option>
                                            <option value="masculino">Masculino</option>
                                            <option value="femenino">Femenino</option>
                                        </select>                                          
                                    </div>
                                    <div class="col">
                                        <label for="">Tipo de vivienda</label>
                                        <select  name="tipoVivienda" class="form-control">
                                            <option value="" selected disabled>Seleccionar</option>
                                            <option value="propia">Propia</option>
                                            <option value="alquilada">Alquilada</option>
                                            <option value="hipotecada">Hipotecada</option>
                                            <option value="conFamiliar">Vive con un familiar</option>
                                            <option value="otro">Otro...</option>
                                        </select>
                                    </div>   
                                    <div class="col">
                                        <label for="numHabitacion">Numero de habitacion</label>
                                        <input type="text" name="numeroHabitacion"  class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col">
                                    <label for="gradp">Nivel a cursar</label>
                                    <select  name="gradp" class="form-control">
                                            <?php foreach ($degrees as $degree): ?>
                                                <option value="<?php echo $degree['iddeg']; ?>"><?php echo $degree['nomgra']; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="col">
                                    <label for="period">Periodo escolar</label>
                                    <select  name="period" class="form-control">
                                            <?php foreach ($degrees1 as $periods): ?>
                                                <option value="<?php echo $periods['idper']; ?>"><?php echo $periods['nomperi']; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <div class="col">
                                    <label for="period">seccion</label>
                                    <select  name="seccion" class="form-control">
                                            <?php foreach ($seccion as $periods): ?>
                                                <option value="<?php echo $periods['idsec']; ?>"><?php echo $periods['nomsec']; ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>
                            </div>

                            <div id="lineCentral"></div>

                            <div class="col">
                                <h4>Datos del representante</h4>
                                
                                <div class="row">
                                    <div class="col">
                                        <label for="representanteRegistrado">¿El Representante Ya Está Registrado?</label>
                                        <select id="representanteRegistrado" name="representanteRegistrado" class="form-control" onchange="toggleFormulario()">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="si">Sí</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="buscarCedula" style="display: none;">
                                    <div class="row">
                                        <div class="col">
                                            <label for="cedulaRepresentante">Ingrese la cédula del representante</label>
                                            <input type="text" id="cedulaRepresentante" name="cedulaRepresentante" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div id="formulario" style="display: none;">
                                    <div class="row">
                                        <div class="col">
                                            <label for="apellidoRep">Apellidos</label>
                                            <input type="text" id="apellidoRep" name="apellidoRep" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="nombreRep">Nombres</label>
                                            <input type="text" id="nombreRep" name ="nombreRep"class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="cedulaRep">Cédula de identidad</label>
                                            <input type="text" id="cedulaRep" name="cedulaRep" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="correoRep">Correo electrónico</label>
                                            <input type="email" id="correoRep" name="correoRep" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="profesion">Profesión</label>
                                            <input type="text" id="profesion" name="profesion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="numeroRep">Número de teléfono</label>
                                            <input type="text" id="numeroRep" name="numeroRep" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="viviendaRep">Lugar de vivienda</label>
                                            <input type="text" id="viviendaRep" name="viviendaRep" class="form-control">
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col">
                                            <label for="fotoEstudiante">Foto del estudiante</label>
                                            <input type="file" id="fotoEstudiante" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="fotoRep">Foto del representante</label>
                                            <input type="file" id="fotoRep" class="form-control">
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" name="agregar" ><h5>Registrar</h5></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="../../Assets/js/popper.min.js"></script>
<script src="../../Assets/js/bootstrap-1.min.js"></script>
<script src="../../Assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
function toggleFormulario() {
    const select = document.getElementById("representanteRegistrado");
    const buscarCedula = document.getElementById("buscarCedula");
    const formulario = document.getElementById("formulario");

    if (select.value === "si") {
        buscarCedula.style.display = "block"; // Mostrar el campo de cédula
        formulario.style.display = "none"; // Ocultar el formulario
    } else if (select.value === "no") {
        buscarCedula.style.display = "none"; // Ocultar el campo de cédula
        formulario.style.display = "block"; // Mostrar el formulario
    } else {
        buscarCedula.style.display = "none"; // Ocultar el campo de cédula
        formulario.style.display = "none"; // Ocultar el formulario
    }
}

function filtrarRepresentantes() {
    const input = document.getElementById("buscarCedula").value.toLowerCase();
    const select = document.getElementById("selectRept");
    const options = select.options;

    // Restablecer las opciones
    for (let i = 0; i < options.length; i++) {
        const option = options[i];
        option.style.display = ""; // Mostrar todas las opciones inicialmente
    }

    // Filtrar opciones según la cédula ingresada
    for (let i = 1; i < options.length; i++) { // Comenzar desde 1 para omitir la opción vacía
        const cedula = options[i].getAttribute("data-cedula").toLowerCase();
        if (!cedula.includes(input)) {
            options[i].style.display = "none"; // Ocultar las opciones que no coinciden
        }
    }

    // Limpiar los campos de datos si no hay coincidencias
    if (input === "") {
        limpiarDatosRepresentante();
    }
}

function cargarDatosRepresentante() {
    const select = document.getElementById("selectRept");
    const selectedOption = select.options[select.selectedIndex];

    // Obtener los datos del representante seleccionado
    const nombre = selectedOption.getAttribute("data-nombre");
    const apellido = selectedOption.getAttribute("data-apellido");
    const cedula = selectedOption.getAttribute("data-cedula");
    const correo = selectedOption.getAttribute("data-correo");
    const profesion = selectedOption.getAttribute("data-profesion");
    const telefono = selectedOption.getAttribute("data-telefono");
    const vivienda = selectedOption.getAttribute("data-vivienda");

    // Asignar los valores a los campos correspondientes
    document.getElementById("nombreRep").value = nombre || '';
    document.getElementById("apellidoRep").value = apellido || '';
    document.getElementById("cedulaRep").value = cedula || '';
    document.getElementById("correoRep").value = correo || '';
    document.getElementById("profesion").value = profesion || '';
    document.getElementById("numeroRep").value = telefono || '';
    document.getElementById("viviendaRep").value = vivienda || '';
}

function limpiarDatosRepresentante() {
    document.getElementById("nombreRep").value = '';
    document.getElementById("apellidoRep").value = '';
    document.getElementById("cedulaRep").value = '';
    document.getElementById("correoRep").value = '';
    document.getElementById("profesion").value = '';
    document.getElementById("numeroRep").value = '';
    document.getElementById("viviendaRep").value = '';
    document.getElementById("viviendaRep").value = vivienda || '';
};

</script>

<?php  
if (isset($_POST['agregar'])) {
    $cedEsc      = $_POST['cedEsc'];
    $nombres     = $_POST['nombres'];
    $apellidos   = $_POST['apellidos'];
    $lugarVivEst = $_POST['lugarVivEst'];
    $tipoVivienda = $_POST['tipoVivienda'];
    $lugarNacEst = $_POST['lugarNacEst'];
    $numeroHabitacion = $_POST['numeroHabitacion'];
    $fechaNacEst = $_POST['fechaNacEst'];
    $selectedLevel = $_POST['gradp'];
    $selectedPeriod = $_POST['period'];
    $generoEst = $_POST['genero'];
    $representanteRegistrado = $_POST['representanteRegistrado'];
    $cedulaRepresentante = $_POST['cedulaRepresentante'];
    $nombreRep = $_POST['nombreRep'];
    $apellidoRep = $_POST['apellidoRep'];
    $cedulaRep = $_POST['cedulaRep'];
    $correoRep = $_POST['correoRep'];
    $profesion = $_POST['profesion'];
    $numeroRep = $_POST['numeroRep'];
    $viviendaRep = $_POST['viviendaRep'];
    $seccion = $_POST['seccion'];

    // Validaciones
    $errMSG = '';

    // Validar que la cédula escolar sea solo números
    if (empty($cedEsc)) {
        $errMSG = "Por favor, ingrese la cédula escolar.";
    } elseif (!ctype_digit($cedEsc)) {
        $errMSG = "La cédula escolar debe contener solo números.";
    } elseif (empty($apellidos)) {
        $errMSG = "Por favor, ingrese los apellidos.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $apellidos)) {
        $errMSG = "Los apellidos deben contener solo letras.";
    } elseif (empty($nombres)) {
        $errMSG = "Por favor, ingrese los nombres del estudiante.";
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $nombres)) {
        $errMSG = "Los nombres deben contener solo letras.";
    } elseif (empty($lugarVivEst)) {
        $errMSG = "Por favor, ingrese la dirección de vivienda.";
    } elseif (empty($tipoVivienda)) {
        $errMSG = "Por favor, seleccione el tipo de vivienda.";
    } elseif (empty($lugarNacEst)) {
        $errMSG = "Por favor, ingrese el lugar de nacimiento.";
    } elseif (empty($numeroHabitacion)) {
        $errMSG = "Por favor, ingrese el número de habitación.";
    } elseif (empty($fechaNacEst)) {
        $errMSG = "Por favor, ingrese la fecha de nacimiento.";
    } elseif (empty($selectedLevel)) {
        $errMSG = "Por favor, seleccione el nivel a cursar.";
    } elseif (empty($selectedPeriod)) {
        $errMSG = "Por favor, seleccione el período escolar.";
    } elseif (empty($generoEst)){
        $errMSG = "Por favor, ingrese el género del estudiante.";
    } elseif ($representanteRegistrado === 'si' && empty($cedulaRepresentante)) {
        $errMSG = "Por favor, ingrese la cédula del representante.";
    } elseif ($representanteRegistrado === 'no' && (empty($nombreRep) || empty($apellidoRep) || empty($cedulaRep) || empty($correoRep) || empty($profesion) || empty($numeroRep) || empty($viviendaRep) || empty($genero))) {
        $errMSG = "Por favor, complete todos los campos del representante.";
    } elseif ($representanteRegistrado === 'no' && (!preg_match('/^[a-zA-Z\s]+$/', $nombreRep) || !preg_match('/^[a-zA-Z\s]+$/', $apellidoRep))) {
        $errMSG = "Los nombres y apellidos del representante deben contener solo letras.";
    } elseif ($representanteRegistrado === 'no' && (!ctype_digit($cedulaRep))) {
        $errMSG = "La cédula del representante debe contener solo números.";
    } elseif ($representanteRegistrado === 'no' && (!filter_var($correoRep, FILTER_VALIDATE_EMAIL))) {
        $errMSG = "El correo electrónico del representante no es válido.";
    } elseif ($representanteRegistrado === 'no' && (!preg_match('/^[a-zA-Z\s]+$/', $profesion))) {
        $errMSG = "La profesión del representante debe contener solo letras.";
    } elseif ($representanteRegistrado === 'no' && (!ctype_digit($numeroRep))) {
        $errMSG = "El número de teléfono del representante debe contener solo números.";
    } elseif ($representanteRegistrado === 'no' && (empty($viviendaRep))) {
        $errMSG = "Por favor, ingrese la dirección de vivienda del representante.";
    } elseif ($representanteRegistrado === 'no' && (empty($genero))) {
        $errMSG = "Por favor, seleccione el género del representante.";
    }

    if (empty($errMSG)) {
        // Formatear la fecha correctamente
        $fechaNacEst = date('Y-m-d', strtotime($fechaNacEst));

        // Calcular la edad
        $fechaNacimiento = new DateTime($fechaNacEst);
        $fechaActual = new DateTime();
        $edad = $fechaActual->diff($fechaNacimiento)->y;

        // Puedes usar la variable $edad según sea necesario, por ejemplo, guardarla en la base de datos o mostrarla
        // echo "La edad del estudiante es: " . $edad . " años.";

        if ($representanteRegistrado === 'si') {
            // Buscar el representante en la base de datos
            $stmt = $connect->prepare("SELECT * FROM fathers WHERE dnifa = :cedulaRepresentante");
            $stmt->bindParam(':cedulaRepresentante', $cedulaRepresentante);
            $stmt->execute();
            $representante = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($representante) {
                // Insertar al estudiante y asociarlo al representante
                $stmt = $connect->prepare("INSERT INTO students(dnist, nomstu, apestu, direce, tipoViv, lugaNacEst, telfViv, fenac, gradp, period, state, rol, st, dnifa, sexes, edast, idsec) VALUES(:cedEsc, :nombres, :apellidos, :lugarVivEst, :tipoVivienda, :lugarNacEst, :numeroHabitacion, :fechaNacEst, :selectedLevel, :selectedPeriod, 'Activo', '', '1', :dnifa, :generoEst, :edad, :seccion)");
                $stmt->bindParam(':dnifa', $representante['dnifa']);
                $stmt->bindParam(':edad', $edad);
                $stmt->bindParam(':seccion', $seccion);

                
                // if ($stmt->execute()) {
                //     echo '<script type="text/javascript">
                //         swal("¡Registrado!", "Estudiante agregado correctamente.", "success").then(function() {
                //         header(location: "mostrar.php");
                //         });
                //     </script>';
                // } else {
                //     $errMSG = "Error al insertar al estudiante.";
                //     echo '<script type="text/javascript">
                //     swal("Error", "' . $errMSG . '", "error").then(function() {
                //         // Puedes redirigir o realizar otra acción aquí si lo deseas
                //     });
                // </script>';
                // }

            } else {
                $errMSG = "No se encontró el representante en la base de datos.";
            }

            $stmt3 = $connect->prepare("INSERT INTO fatherstuden(idfa, idstu, nomstu) VALUES(:cedulaRep, :cedEsc, :nombres)");
            $stmt3->bindParam(':cedulaRep', $representante['dnifa']);
            $stmt3->bindParam(':cedEsc', $cedEsc);
            $stmt3->bindParam(':nombres', $nombres);

            if($stmt3->execute()){
                echo '<script type="text/javascript">
                swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
        window.location.href = "mostrar.php";
                });
            </script>';
            } else {
                $errMSG = "Error al insertar al estudiante en fatherstuden.";
                echo $errMSG;
            }

        } else {
            // Insertar al representante y luego al estudiante
            $stmt = $connect->prepare("INSERT INTO fathers(dnifa, nomfa, apellido, profefa, correo, telefa, direc) VALUES(:cedulaRep, :nombreRep, :apellidoRep, :profesion, :correoRep, :numeroRep, :viviendaRep)");
            $stmt->bindParam(':cedulaRep', $cedulaRep);
            $stmt->bindParam(':nombreRep', $nombreRep);
            $stmt->bindParam(':apellidoRep', $apellidoRep);
            $stmt->bindParam(':profesion', $profesion);
            $stmt->bindParam(':correoRep', $correoRep);
            $stmt->bindParam(':numeroRep', $numeroRep);
            $stmt->bindParam(':viviendaRep', $viviendaRep);

            if ($stmt->execute()) {
                // Insertar al estudiante y asociarlo al representante
                $stmt = $connect->prepare("INSERT INTO students(dnist, nomstu, apestu, direce, tipoViv, lugaNacEst, telfViv, fenac, gradp, period, state, rol, st, dnifa, sexes, edadst, idsec) VALUES(:cedEsc, :nombres, :apellidos, :lugarVivEst, :tipoVivienda, :lugarNacEst, :numeroHabitacion, :fechaNacEst, :selectedLevel, :selectedPeriod, 'Activo', '', '1', :cedulaRep, :generoEst, :edad, :seccion)");
                $stmt->bindParam(':cedulaRep', $cedulaRep);
                $stmt->bindParam(':edad', $edad);
                $stmt->bindParam(':seccion', $seccion);
            } else {
                $errMSG = "Error al insertar al representante.";
            }

            $stmt3 = $connect->prepare("INSERT INTO fatherstuden(idfa, idstu, nomstu) VALUES(:cedulaRep, :cedEsc, :nombres)");
            $stmt3->bindParam(':cedulaRep', $cedulaRep);
            $stmt3->bindParam(':cedEsc', $cedEsc);
            $stmt3->bindParam(':nombres', $nombres);

            if($stmt3->execute()){
                echo '<script type="text/javascript">
                swal("¡Registrado!", "Agregado correctamente en fatherstuden", "success").then(function() {
                });
            </script>';
            } else {
                $errMSG = "Error al insertar al estudiante en fatherstuden.";
                echo $errMSG;
            }

        }

        $stmt->bindParam(':cedEsc', $cedEsc);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':lugarVivEst', $lugarVivEst);
        $stmt->bindParam(':tipoVivienda', $tipoVivienda);
        $stmt->bindParam(':lugarNacEst', $lugarNacEst);
        $stmt->bindParam(':generoEst', $generoEst);
        $stmt->bindParam(':numeroHabitacion', $numeroHabitacion);
        $stmt->bindParam(':fechaNacEst', $fechaNacEst);
        $stmt->bindParam(':selectedLevel', $selectedLevel);
        $stmt->bindParam(':selectedPeriod', $selectedPeriod);
        $stmt->bindParam(':edad', $edad);

        if ($stmt->execute()) {
            echo '<script type="text/javascript">
                swal("¡Registrado!", "Estudiante agregado correctamente.", "success").then(function() {
                header(location: "mostrar.php");
                });
            </script>';
        } else {
            $errMSG = "Error al insertar al estudiante.";
        }
    } else {
        echo '<script type="text/javascript">
        swal("Error", "' . $errMSG . '", "error").then(function() {
            // Puedes redirigir o realizar otra acción aquí si lo deseas
        });
    </script>';
    }
}

?>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

</body>
</html>
