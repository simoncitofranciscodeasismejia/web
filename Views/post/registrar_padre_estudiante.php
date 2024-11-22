<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si los datos necesarios están presentes
    if (isset($_POST['dnist']) && isset($_POST['idPadre']) && isset($_POST['txtidfat']) && isset($_POST['dnifa'])) {
        $dnist = $_POST['dnist'];
        $idfa   = $_POST['idPadre'];
        $estado = 1; // Estado activo
        $nomfa  = $_POST['txtidfat'];
        $dnifa  = $_POST['dnifa']; 

        $sentencia = $connect->prepare("SELECT * FROM students WHERE dnist = $dnist;");
        $sentencia->execute();
        $data = $sentencia->fetchAll(PDO::FETCH_OBJ);
        try {
            // Inicia la transacción
            $connect->beginTransaction();

            foreach ($data as $est) {

                $cedEsc = $est['dnist'];
                $nomstu = $est['nomstu'];

                // Inserta en fatherstuden
                $stmt = $connect->prepare("INSERT INTO fatherstuden (idfa, idstu, estado, nomstu) VALUES (?, ?, ?, ?)");
                $stmt->execute([$dnifa, $cedEsc, $estado, $nomstu]); // Asegúrate de pasar nomstu

                // Actualiza students
                $stmt = $connect->prepare("UPDATE students SET st = ?, nomfa = ? WHERE idstu = ?");
                $stmt->execute([0, $nomfa, $idstu]); // Cambia '0' a una variable para mayor claridad
            }

            // Confirma la transacción
            $connect->commit();

            echo json_encode(['success' => true, 'message' => 'Operaciones realizadas con éxito.']);
        } catch (PDOException $e) {
            // Revierte la transacción en caso de error
            $connect->rollBack();
            echo json_encode(['success' => false, 'message' => 'Error al realizar las operaciones: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Faltan datos necesarios.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
