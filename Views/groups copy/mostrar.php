
<?php
   session_start();
  
  if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../home.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>Sección y Notas | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="../../Assets/css/custom.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo_nuevo.jpg">
		<!--google fonts -->
	
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
       <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js.map">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=visibility" />
        <link rel="stylesheet" type="text/css" href="../../Assets/css/profile.css">
  </head>
  <body>
  

<div class="wrapper">


        <div class="body-overlay"></div>
		
		<!-------------------------sidebar------------>
		     <!-- Sidebar  -->
  <nav id="sidebar">
    <div class="sidebar-header">
        <div class="img">
            <img src="../../Assets/img/logo_nuevo.jpg" class="img-fluid" alt="Logo"/>
        </div>
        <h3>
            <span>Centro de Educación Inicial Simoncito "Francisco de Asis Mejia"</span>
        </h3>
    </div>

    <div class="navMenu">
        <ul class="list-unstyled components">
            <li class="">
                <a href="../admin/pages-admin.php" class="dashboard">
                    <i class="material-icons">dashboard</i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#submenuPersona" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">groups</i>
                    <span>Personas</span>
                </a>
                <ul class="collapse list-unstyled menu" id="submenuPersona">
                    <li>
                        <a href="../users/mostrar">
                            <i class="material-icons">person_outline</i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="../fathers/mostrar">
                            <i class="material-icons">supervisor_account</i>
                            <span>Representante</span>
                        </a>
                    </li>
                    <li>
                        <a href="../teachers/mostrar">
                            <i class="material-icons">psychology</i>
                            <span>Docentes</span>
                        </a>
                    </li>
                    <li>
                        <a href="../students/mostrar">
                            <i class="material-icons">sentiment_very_satisfied</i>
                            <span>Alumnos</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#submenuGestion" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">school</i>
                    <span>Gestión</span>
                </a>
                <ul class="collapse list-unstyled menu" id="submenuGestion">
                    <li class="">
                        <a href="../period/mostrar">
                            <i class="material-icons">calendar_month</i>
                            <span>Periodo escolar</span>
                        </a>
                    </li>
                    <li>
                        <a href="../grade/mostrar">
                            <i class="material-icons">diversity_3</i>
                            <span>Grados</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../groups/mostrar">
                            <i class="material-icons">card_membership</i>
                            <span>Sección y Notas</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#submenuCuenta" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle dropdown-toggle-active">
                    <i class="material-icons">account_circle</i>
                    <span>Cuenta</span>
                </a>
                <ul class="collapse" id="submenuCuenta">
                    <li class="">
                        <a href="../profile/mostrar.php">Perfil</a>
                    </li>
                    <li>
                        <a href="../pages-logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>	
		<!--------page-content---------------->
		
		<div id="content">
		   
		   <!--top--navbar----design--------->
		   
		   <div class="top-navbar">
		      <div class="xp-topbar">

                <!-- Start XP Row -->
                <div class="row"> 
                    <!-- Start XP Col -->
                    <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                        <div class="xp-menubar">
                               <span class="material-icons text-white">signal_cellular_alt
							   </span>
                         </div>
                    </div> 
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-md-5 col-lg-3 order-3 order-md-2">
                        <div class="xp-searchbar">
                            <form>
                                <div class="input-group">
                                  <input type="search" class="form-control" 
								  placeholder="Buscar...">
                                  <div class="input-group-append">
                                    <button class="btn" type="submit" 
									id="button-addon2">Buscar</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End XP Col -->

                    <!-- Start XP Col -->
                    <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                        <div class="xp-profilebar text-right">
							 <nav class="navbar p-0">
                        <ul class="nav navbar-nav flex-row ml-auto">   
                            <li class="dropdown nav-item active">
                               
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" data-toggle="dropdown">
								<img src="../../Assets/img/user.png" style="width:40px; border-radius:50%;"/>
								</a>
								<ul class="dropdown-menu small-menu">
                                    <li>
                                        <a href="../profile/mostrar.php">
										  <span class="material-icons">
person_outline
</span>Perfil
										</a>
                                    </li>>
                                    <li>
                                        <a href="../pages-logout.php"><span class="material-icons">
logout</span>Cerrar sesión</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    
               
            </nav>
							
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div> 
                <!-- End XP Row -->

            </div>
		     <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>  
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>
                    
                  </ol>                
            </div>
			
		   </div>

           <!--------main-content------------->


            <div class="main-content">
              <div class="row">
                
                <div class="col-md-12">
                <div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Sección y Notas</h2>
        </div>

        <div class="col-sm-12 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
          <i class="material-icons">&#xE147;</i> </a>
         
        </div>
      </div>


    </div>

      

<?php 

 ?>

<div class="card-content table-responsive" style="overflow-x: hidden; height: 60vh;">
    
    <form method="POST" class="">
        <br>
        <div class="row text-center">
            <div class="col">
                <label for="grado" class="text-end">Seleccione Grado:</label>
            </div>
            <div class="col">
                <select name="grado" id="grado" class="form-control">
                    <?php
                        require '../../Config/config.php';
                        $stmt = $connect->prepare("SELECT * FROM degree");
                        $stmt->execute();
                        ?><option value="" disabled selected>Grado</option><?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['iddeg']}'>{$row['nomgra']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col">
                <label for="seccion" class="text-end">Seleccione Sección:</label>
            </div>
            <div class="col">
                <select name="seccion" id="seccion" class="form-control">
                    <?php
                        $stmt = $connect->prepare("SELECT * FROM seccion");
                        $stmt->execute();
                        ?><option value="" disabled selected>Sección</option><?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['idsec']}'>{$row['nomsec']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-lg-3">
                <button name="search" id="btn-filtrar">Filtrar</button>
            </div>
        </div>
    </form>


    <?php 
if (isset($_POST['grado']) && isset($_POST['seccion'])) {
    $grado = $_POST['grado'];
    $seccion = $_POST['seccion'];

    // Realiza la consulta para obtener el nombre del grado y la sección
    $queryGradoSeccion = $connect->prepare("SELECT degree.nomgra AS nombre_grado, seccion.nomsec AS nombre_seccion 
                                             FROM seccion
                                             INNER JOIN degree ON seccion.idsub = degree.iddeg
                                             WHERE seccion.idsec = ?");
    $queryGradoSeccion->execute([$seccion]);
    $gradoSeccion = $queryGradoSeccion->fetch(PDO::FETCH_OBJ);

    // Realiza la consulta para obtener los datos del docente y los estudiantes
    $query = $connect->prepare("SELECT teachers.nomte, students.nomstu, students.idstu, students.dnist, students.apestu
                                 FROM teachers 
                                 INNER JOIN seccion ON teachers.idtea = seccion.idtea 
                                 INNER JOIN students ON students.idsec = seccion.idsec 
                                 WHERE seccion.idsec = ? AND seccion.idsub = ?");
    $query->execute([$seccion, $grado]);

    // Muestra el grado y la sección
    if ($gradoSeccion) {
        echo "<br><h2 class='text-center'>Grado: " . htmlspecialchars($gradoSeccion->nombre_grado) . " - Sección: " . htmlspecialchars($gradoSeccion->nombre_seccion) . "</h2><br>";
    } else {
        echo "<h2>Grado y Sección no encontrados.</h2>";
    }

    echo "<table class='table table-striped'>";
    echo "<thead class='text-center'>
            <tr>
                <th>Cedula escolar</th>
                <th>Estudiante</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
          </thead>
          <tbody>";

    // Muestra los resultados
    if ($query->rowCount() > 0) {
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row->dnist) . "</td>";
            echo "<td>" . htmlspecialchars($row->nomstu) . " " . htmlspecialchars($row->apestu) . "</td>";
            echo "<td>
            <td>
                <a href='../students/mostrar_estudiante.php?idstu= " . htmlspecialchars($row->idstu) . "' class='btn btn-success text-white'>
                    <i class='material-symbols-outlined'>
                        visibility  
                    </i> Ver estudiante
                </a></td>
               <td> <form action='constancia.php' method='post' class=''>
                    <input type='hidden' id='estudiante_id' name='estudiante_id' value=" . htmlspecialchars($row->dnist) . ">
                    <button type='submit' class='btn btn-primary text-white'>
                        <i class='material-icons'>print</i> constancia
                    </button>
                </form></td>

                        <td>
                <a href='boleta.php?idstu= " . htmlspecialchars($row->idstu) . "' class='btn btn-success text-white'>
                    <i class='material-icons'>print</i> Crear boletin
                </a></td>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p>No se encontraron registros para el grado y sección seleccionados.</p>";
    }
} else {
    echo '<br><div class="alert alert-info">Seleccione un grado y una seccion por favor.</div>';
}

                        ?>



</div>


  </div>
</div>
 
<!-- add Modal HTML -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form  enctype="multipart/form-data" method="POST"  autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa fa-user mr-1"></i>Nueva seccion
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal_contact_firstname">Periodo escolar</label>
                                    <div class="input-group">

                                    <select name="periodo" id="periodo" class="form-control">
                                    <?php
                        $stmt2 = $connect->prepare("SELECT * FROM period");
                        $stmt2->execute();
                        ?><option value="" disabled selected></option><?php
                        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$row['idper']}'>{$row['nomperi']}</option>";
                        }
                    ?>
                </select>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal_contact_lastname">Grado</label>
                                    <div class="input-group">
                                    <select name="grado" id="grado" class="form-control">
                                        <?php
                                            $stmt1 = $connect->prepare("SELECT * FROM degree");
                                            $stmt1->execute();
                                            ?><option value="" disabled selected></option><?php
                                            while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option value='{$row['iddeg']}'>{$row['nomgra']}</option>";
                                            }
                                        ?>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- <div class="form-row">
                            <label for="modal_contact_lastname">Profesor</label>
                            <div class="input-group">
                            <select name="idtea" id="idtea" class="form-control">
                                <?php
                                    // $stmt3 = $connect->prepare("SELECT * FROM techears");
                                    // $stmt3->execute();
                                    // ?><option value="" disabled selected></option><?php
                                    // while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                    //     echo "<option value='{$row['idtea']}'>{$row['nomte']}</option>";
                                    // }
                                ?>
                            </select>
                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal_contact_lastname">Nombre</label>
                                    <div class="input-group">
                                        <input type="text" name="nomsec" id="nomsec" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group pad-ver">
    <div class="form-group">
                
    </div>

</div> 

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        <button  name='agregar' class="btn btn-primary">GUARDAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<!-- Edit Modal HTML -->
</div>
        </div>
        <div style="
        text-align: center; 
        background-color: #d6d6f0;
        overflow: hidden;
        padding: 10px;
        ">
            <?php include("../footer.php"); ?>
        </div>
</div>
</div>
<!----------html code compleate----------->
  
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
   <script src="../../Assets/js/popper.min.js"></script>
   <script src="../../Assets/js/bootstrap-1.min.js"></script>
   <script src="../../Assets/js/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
		$(document).ready(function(){
		  $(".xp-menubar").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".xp-menubar,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
</script>
<script type="text/javascript">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php  

if(isset($_POST['agregar']))
{
    
    $nomsec = $_POST['nomsec'];
    $periodo = $_POST['periodo'];
    $grado = $_POST['grado'];
    // $idtea = $_POST['idtea'];
    // $capa = $_POST['capa'];

        // echo $item . "<br>";
        
        $statement = $connect->prepare("INSERT INTO seccion (nomsec,idsub,idper,state) VALUES ('$nomsec','$grado','$periodo','Activo')");
        //Execute the statement and insert our values.
$inserted = $statement->execute();
  

    if($inserted){
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
}
}

?>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },3000);

});
</script>


<?php  
if(isset($_POST['eliminar'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `seccion` WHERE `idsec`=:idsec";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idsec', $idsec, PDO::PARAM_INT);
$idsec=trim($_POST['idsec']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("¡Eliminado!", "Eliminado correctamente", "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
}
else{
    echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
  


  <?php
    
if(isset($_POST['actualizar'])){
///////////// Informacion enviada por el formulario /////////////
$idsec=trim($_POST['idsec']); 
$nomsec=trim($_POST['nomsec']);    
$idtea=trim($_POST['idtea']);
$capa=trim($_POST['capa']);
$state=trim($_POST['state']);


///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE seccion
SET `nomsec`= :nomsec, `idtea` = :idtea, `capa` = :capa, `state` = :state WHERE `idsec` = :idsec";
$sql = $connect->prepare($consulta);
$sql->bindParam(':nomsec',$nomsec,PDO::PARAM_STR, 25);
$sql->bindParam(':idtea',$idtea,PDO::PARAM_STR, 25);
$sql->bindParam(':capa',$capa,PDO::PARAM_STR, 25);
$sql->bindParam(':state',$state,PDO::PARAM_STR, 25);
$sql->bindParam(':idsec',$idsec,PDO::PARAM_INT);

$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
}
else{
    echo "<div class='content alert alert-danger'> No se pudo actulizar el registro  </div>";

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>
<!-- <script src="../../Assets/js/periodo.js"></script> -->
  </body>
  
  </html>


