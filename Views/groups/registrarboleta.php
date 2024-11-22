<?php

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


if(isset($_POST['enviar'])){
    // Validar que el ID del estudiante esté presente
    // if(empty($_POST['idstu'])){
    //     echo "Por favor, ingrese el ID del estudiante.";
    //     return;
    // }
    $nombre = $_POST['nomstu'];
    $idstu = $_POST['idstu'];
    $gradolevel = $_POST['gradelevel'];

    // Validar que el nivel de grado esté presente
    if(empty($gradolevel)){
        echo "Por favor, seleccione el nivel de grado.";
        return;
    }

    // Validar que la calificación de lenguaje y comunicación esté presente
    if(empty($_POST['languagearts'])){
        echo "Por favor, ingrese la calificación de lenguaje y comunicación.";
        return;
    }

    // Validar que la calificación de matemáticas esté presente
    if(empty($_POST['mathematics'])){
        echo "Por favor, ingrese la calificación de matemáticas.";
        return;
    }

    // Validar que la calificación de expresión artística esté presente
    if(empty($_POST['art'])){
        echo "Por favor, ingrese la calificación de expresión artística.";
        return;
    }

    // Validar que la calificación de educación física esté presente
    if(empty($_POST['educFisica'])){
        echo "Por favor, ingrese la calificación de educación física.";
        return;
    }

    // Validar que el ID del estudiante sea un número entero
    // $idstu = filter_var($_POST['idstu'], FILTER_VALIDATE_INT);
    // if($idstu === false){
    //     echo "El ID del estudiante debe ser un número entero.";
    //     return;
    // }

    // Validar que los campos de calificación sean letras válidas (A, B, C, D, F)
    $validGrades = array('A', 'B', 'C', 'D', 'F');
    if(!in_array($_POST['languagearts'], $validGrades) || !in_array($_POST['mathematics'], $validGrades) || !in_array($_POST['art'], $validGrades) || !in_array($_POST['educFisica'], $validGrades)){
        echo "Las calificaciones deben ser letras válidas (A, B, C, D, F).";
        return;
    }

    // Validar que las observaciones no excedan los 65535 caracteres (límite de TEXT)
    $observaciones = substr($_POST['observaciones'], 0, 65535);

    // Preparar y ejecutar la consulta SQL
    $sql = "INSERT INTO calificaciones (
        nombre_estudiante,
        dnist,
        idper,
        lenguaje_comunicacion,
        matematicas,
        expresion_artistica,
        educacion_fisica,
        observaciones,
        aprobacion
    ) VALUES (
        :nomstu,
        :idstu,
        :gradeLevelId,
        :languageArts,
        :mathematics,
        :art,
        :educFisica,
        :observaciones,
        :aprobacion
    )";

    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':nomstu', $nombre);
    $stmt->bindParam(':idstu', $idstu);
    $stmt->bindParam(':gradeLevelId', $_POST['gradelevel']);
    $stmt->bindParam(':languageArts', $_POST['languagearts']);
    $stmt->bindParam(':mathematics', $_POST['mathematics']);
    $stmt->bindParam(':art', $_POST['art']);
    $stmt->bindParam(':educFisica', $_POST['educFisica']);
    $stmt->bindParam(':observaciones', $observaciones);
    $stmt->bindParam(':aprobacion', $_POST['aprobacion']);

    if ($stmt->execute()) {

        echo '<script type="text/javascript">
        swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
window.location.href = "mostrar.php";
        });
    </script>';
    } else {
        echo "Error al guardar los datos.";
    }
}
