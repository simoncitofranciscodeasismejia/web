
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
        <title>Grado académico | Centro de Educación Inicial Simoncito Francisco de Asis Mejia</title>
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
                <a href="pages-admin.php" class="dashboard">
                    <i class="material-icons">dashboard</i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">groups</i>
                    <span>Personas</span>
                </a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu2">
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
                <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">school</i>
                    <span>Gestión</span>
                </a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu1">
                    <li>
                        <a href="../period/mostrar">
                            <i class="material-icons">calendar_month</i>
                            <span>Periodo escolar</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../grade/mostrar">
                            <i class="material-icons">diversity_3</i>
                            <span>Grados</span>
                        </a>
                    </li>
                    <li>
                        <a href="../groups/mostrar">
                            <i class="material-icons">card_membership</i>
                            <span>Sección y Notas</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">account_circle</i>
                    <span>Cuenta</span>
                </a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                    <li>
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
                                    </li>
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
          <h2 class="ml-lg-2">Grado académico</h2>
        </div>

        <div class="col-sm-12 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
          <i class="material-icons">&#xE147;</i> </a>

          <a href="plantilla.php" class="btn btn-danger">
          <i class="material-icons">print</i> </a>
         
        </div>
      </div>


    </div>

      <?php 
 require '../../Config/config.php';

 $productosPorPagina = 5;
        $pagina = 1;
            if (isset($_GET["pagina"])) {
                $pagina = $_GET["pagina"];
                }
        $limit = $productosPorPagina;
        $offset = ($pagina - 1) * $productosPorPagina;

        $sentencia = $connect->query("SELECT degree.iddeg, period.idper, period.numperi, period.starperi, period.endperi, period.nomperi, degree.nomgra, degree.fere,count(*) AS conteo FROM degree INNER JOIN period ON degree.idper = period.idper;");
    $conteo = $sentencia->fetchObject()->conteo;
    $paginas = ceil($conteo / $productosPorPagina);
    $sentencia = $connect->prepare("SELECT degree.iddeg, period.idper, period.numperi, period.starperi, period.endperi, period.nomperi, degree.nomgra, degree.fere FROM degree INNER JOIN period ON degree.idper = period.idper LIMIT ? OFFSET ?");
    $sentencia->execute([$limit, $offset]);
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
       ?>

    <table class="table table-striped table-hover">
      <thead>
        <tr>
        
          <th>Nombre</th>
          <th>Periodo escolar</th>
          <!-- <th>Editar</th>
          <th>Eliminar</th> -->
        </tr>
      </thead>
      <tbody>
          <?php foreach($productos as $persona){ ?>
            <tr>
               <td><?php echo $persona->nomgra ?></td>
               <td><?php echo $persona->numperi ?></td>
               <td>
<form method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
<input type='hidden' name='iddeg' value="<?php echo  $persona->iddeg; ?>">
<button name='editar' class='btn btn-warning text-white'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></button>
</form>
                   
               </td>
               <!-- <td>
<form  onsubmit="return confirm('Realmente desea eliminar el registro?');" method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
<input type='hidden' name='iddeg' value="<?php echo  $persona->iddeg; ?>">
<button name='eliminar' class='btn btn-danger text-white' ><i class='material-icons'  title='Delete'>&#xE872;</i></button>
</form>
               </td> -->

            </tr>
            <?php } ?>
      </tbody>
    </table>

     <nav aria-label="Page navigation example">
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> grados disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./mostrar?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./mostrar?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./mostrar?pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>

  </div>
</div>

<?php 

if (isset($_POST['editar'])){
$iddeg = $_POST['iddeg'];
$sql= "SELECT degree.iddeg, period.idper, period.numperi, period.starperi, period.endperi, period.nomperi, degree.nomgra, degree.fere FROM degree INNER JOIN period ON degree.idper = period.idper WHERE iddeg = :iddeg"; 
$stmt = $connect->prepare($sql);
$stmt->bindParam(':iddeg', $iddeg, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();
 
?>

    <div class="col-12 col-md-12"> 

<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input value="<?php echo $obj->iddeg;?>" name="iddeg" type="hidden">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Periodo</label>

      <select required name="idper" class="form-control">
    <option value="<?php echo $obj->idper;?>"><?php echo $obj->numperi;?></option>        
    <option value=""><< >></option>

    <?php 
    $stmt = $connect->prepare('SELECT * FROM period');
    $stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idper; ?>"><?php echo $numperi; ?></option>
            <?php
        }
        ?>
     ?>
 
    
    </select>
      
    </div>
    <div class="form-group col-md-6">
      <label for="edad">Grado </label>
      <input value="<?php echo $obj->nomgra;?>" name="nomgra" type="text" class="form-control">
    </div>
  </div>



        <div class="form-group">
          <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
        </div>
</form>
    </div>  
<?php }?>

<!-- add Modal HTML -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form  enctype="multipart/form-data" method="POST"  autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa fa-user mr-1"></i>NUEVO
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal_contact_firstname">Nombre del grado</label>
                                    <div class="input-group">
                                       
                                        <input type="text"  name="txtnomgra" required class="form-control" placeholder="Nombre del grado" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="modal_contact_lastname">Periodo</label>
                                    <div class="input-group">
                                      <select required name="txtidper" class="form-control">
                                       <?php 
                                       $stmt = $connect->prepare('SELECT * FROM period');
                                        $stmt->execute();

                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                                        {
                                            extract($row);
                                            ?>
                                            <option value="<?php echo $idper; ?>"><?php echo $numperi; ?></option>
                                            <?php
                                        }
                                        ?>
                                        ?>     

                                      </select>
                                    
                                    </div>
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
if(isset($_POST['agregar'])){

$nomgra=$_POST['txtnomgra'];
$idper=$_POST['txtidper'];


$sql = "INSERT INTO degree (idper, nomgra) VALUES (:idper, :nomgra)";


//Prepare our statement.
$statement = $connect->prepare($sql);


//Bind our values to our parameters (we called them :make and :model).
$statement->bindValue(':idper', $idper);
$statement->bindValue(':nomgra', $nomgra);

//Execute the statement and insert our values.
$inserted = $statement->execute();


//Because PDOStatement::execute returns a TRUE or FALSE value,
//we can easily check to see if our insert was successful.
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
$consulta = "DELETE FROM `degree` WHERE `iddeg`=:iddeg";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':iddeg', $iddeg, PDO::PARAM_INT);
$iddeg=trim($_POST['iddeg']);
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
$iddeg=trim($_POST['iddeg']);    
$idper=trim($_POST['idper']);
$nomgra=trim($_POST['nomgra']);


///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE degree
SET `idper`= :idper, `nomgra` = :nomgra WHERE `iddeg` = :iddeg";
$sql = $connect->prepare($consulta);
$sql->bindParam(':idper',$idper,PDO::PARAM_STR, 25);
$sql->bindParam(':nomgra',$nomgra,PDO::PARAM_STR, 25);
$sql->bindParam(':iddeg',$iddeg,PDO::PARAM_INT);

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
  </body>
  
  </html>


