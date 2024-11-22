
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
        <title>Docentes | Escuela SAN MARTIN I</title>
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
       <style type="text/css">
           .hideMe {
    display: none;
}
       </style>

       
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
                    <li class="active">
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
                    <li>
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
          <h2 class="ml-lg-2">Docentes</h2>
        </div>

        <div class="col-sm-12 p-0 d-flex justify-content-lg-end justify-content-center">
          <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
          <i class="material-icons">&#xE147;</i> </a> -->

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

        $sentencia = $connect->query("SELECT count(*) AS conteo FROM teachers;");
    $conteo = $sentencia->fetchObject()->conteo;
    $paginas = ceil($conteo / $productosPorPagina);
    $sentencia = $connect->prepare("SELECT * FROM teachers LIMIT ? OFFSET ?");
    $sentencia->execute([$limit, $offset]);
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
       ?>
    <table class="table table-striped table-hover" >
      <thead>
        <tr>
            
          <!-- <th>Foto</th> -->
          <th>Cédula</th>
          <th>Nombre y Apellido</th>
          <th>Genero</th>
          <th>Correo</th>
          <th>Teléfono</th>
          <th>Estado</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
   
    <tbody>
          <?php foreach($productos as $producto){ ?>
            <tr>
               <!-- <td><img src="../../Assets/img/subidas/<?php  ?>" width='90'></td> -->
               <td><?php echo $producto->dnite ?></td>
               <td><?php echo $producto->nomte ?></td>
               <td><?php echo $producto->sexte ?></td>
               <td><?php echo $producto->correo ?></td>
               <td><?php echo $producto->telet ?></td>
               <td>
                       

                        <?php if($producto->state=='Activo')  { ?> 
        <span class="badge badge-success">Activo</span>
    <?php  }   else {?> 
        <span class="badge badge-danger">No activo</span>
        <?php  } ?>  
                            
                    </td>
               <td>
<form method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
<input type='hidden' name='idtea' value="<?php echo  $producto->idtea; ?>">
<button name='editar' class='btn btn-warning text-white'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></button>
</form>
                   
               </td>
               <td>
<form  onsubmit="return confirm('Realmente desea eliminar el registro?');" method='POST' action='<?php $_SERVER['PHP_SELF'] ?>'>
<input type='hidden' name='idtea' value="<?php echo  $producto->idtea; ?>">
<button name='eliminar' class='btn btn-danger text-white' ><i class='material-icons'  title='Delete'>&#xE872;</i></button>
</form>
               </td>

            </tr>
            <?php } ?>
      </tbody>
       </table>

       <nav aria-label="Page navigation example">
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $productosPorPagina ?> de <?php echo $conteo ?> profesores disponibles</p>
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
$idtea = $_POST['idtea'];
$sql= "SELECT * FROM teachers WHERE idtea = :idtea"; 
$stmt = $connect->prepare($sql);
$stmt->bindParam(':idtea', $idtea, PDO::PARAM_INT); 
$stmt->execute();
$obj = $stmt->fetchObject();
 
?>

    <div class="col-12 col-md-12"> 

<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <input value="<?php echo $obj->idtea;?>" name="idtea" type="hidden">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Cédula</label>
      <input value="<?php echo $obj->dnite;?>" maxlength="8"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="dnite" type="text" class="form-control"  placeholder="Cédula">
    </div>
    <div class="form-group col-md-6">
      <label for="edad">Nombre y apellidos</label>
      <input value="<?php echo $obj->nomte;?>" name="nomte" type="text" placeholder="Nombre y apellidos" class="form-control">
    </div>
  </div>


  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Sexo</label>
      <select required name="sexte" class="form-control">
    <option value="<?php echo $obj->sexte;?>"><?php echo $obj->sexte;?></option>        
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
    
    </select>
    </div>

     <div class="form-group col-md-6">
      <label for="nombres">Correo</label>
      <input value="<?php echo $obj->correo;?>" name="correo" type="email" class="form-control" placeholder="Correo">
    </div>
  </div>


    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombres">Teléfono</label>
      <input value="<?php echo $obj->telet;?>" name="telet" maxlength="12"  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" type="text" class="form-control" placeholder="Teléfono móvil">
    </div>

     <div class="form-group col-md-6">
      <label for="nombres">Usuario</label>
      <input value="<?php echo $obj->usuario;?>" name="usuario" type="text" class="form-control" placeholder="Usuario">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">Estado
      <select for="state" value="<?php echo $obj->state;?>" name="state" class="form-control" placeholder="Estado" required name="txtesta">
                                          <!-- <option selected >SELECCIONE</option> -->
                                          <option value="Activo" selected>Activo</option>
                                          <option value="No Activo">No Activo</option>
                                        </select>
    </div>
    </div>

        <div class="form-group">
          <button name="actualizar" type="submit" class="btn btn-primary  btn-block">Actualizar Registro</button>
        </div>
</form>
    </div>  
<?php }?>

<!-- add Modal HTML -->
<div id="addEmployeeModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myTitle" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" autocomplete="off">
        <div class="modal-content">
            <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fa fa-user mr-1"></i>Nuevo docente
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>&times;</span>
                        </button>
                    </div>
            <div class="modal-body">
                <div id="step1"> 

                    <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text"  name="txtdni" maxlength="8" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required class="form-control" placeholder="Cédula" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                 
                                    <div class="input-group">       
                                        <input type="text"  name="txtnom" placeholder="Nombre y apellidos" required class="form-control"/>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="form-row">
                    <div class="col-sm-6">
                                <select class="form-control" name="genero" value="<?php if (isset($_POST['genero'])) echo $_POST['genero']; ?>" required type="text">

                                <option value="" class="form-control" disabled selected>genero</option>
                                <option value="masculino" class="form-control">Masculino</option>
                                <option value="femenino" class="form-control">Femenino</option>

                                </select>
                        
                        </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    
                                    <div class="input-group">
                                       
                                        <input type="email"  name="txtcorr" required class="form-control" placeholder="Correo" />
                                    </div>
                                </div>
                            </div>

                    </div>


                    <div class="form-row">
                    <div class="col-sm-6">
                                <select name="prefijo" class="form-control" id="prefijo">
                                    <option value="" class="form-control" disabled selected>prefijo</option>
                                    <option value="0412" class="form-control">0412</option>
                                    <option value="0414" class="form-control">0414</option>
                                    <option value="0416" class="form-control">0416</option>
                                    <option value="0424" class="form-control">0424</option>
                                    <option value="0426" class="form-control">0426</option>
                                </select>
                                </div>
                                <div class="col-sm-6">

                                    <input class="form-control" name="telefono" value="<?php if (isset($_POST['telefono'])) echo $_POST['telefono']; ?>" autocomplete="off" required type="text" placeholder="Telefono celular">
                                </div>
                        
                    </div>
                    <br>

                   <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                 
                                    <div class="input-group">       
                                        <input type="text"  name="txtusua" placeholder="Usuario" required class="form-control"/>
                                    </div>
                                </div>
                            </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                         
                                            <div class="input-group">       
                                                <input type="password"  name="txtcla" placeholder="Contraseña" required class="form-control"/>
                                            </div>
                                        </div>
                                    </div>

                    </div> 



                             <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    
                                    <div class="input-group">
                                        <select class="form-control" required name="txtperm">
                                          <option selected>Permisos</option>
                                          <option value="2">Docente</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                    </div>   
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            
                    <button id="agregar" name="agregar" class="btn btn-success text-white">Siguiente</button>
                        </div>
                        <div class="col-sm-6">
                            

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer"></div>
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
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email


    $dnite=$_POST['txtdni'];
    $nomte=$_POST['txtnom'];
    $correo=$_POST['txtcorr'];
    $telet=$_POST['prefijo'] . $_POST['telefono'];
    $genero=$_POST['genero'];
    $usuario=$_POST['txtusua'];
    $clave=$_POST['txtcla'];
    // $rol=$_POST['txtperm'];

    // $imgFile = $_FILES['foto']['name'];
    // $tmp_dir = $_FILES['foto']['tmp_name'];
    // $imgSize = $_FILES['foto']['size'];
    if (empty($dnite)) {
        $errMSG = "Por favor, ingrese su cédula de identidad.";
    } elseif (empty($nomte)) {
        $errMSG = "Por favor, ingrese su nombre y apellido.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $nomte)) {
        $errMSG = "El nombre y apellido solo pueden contener letras y espacios.";
    } elseif (empty($genero)) {
        $errMSG = "Por favor, ingrese su género.";
    } elseif (empty($correo)) {
        $errMSG = "Por favor, ingrese su correo.";
    } elseif (empty($telet)) {
        $errMSG = "Por favor, ingrese su número telefónico.";
    } elseif (empty($usuario)) {
        $errMSG = "Por favor, ingrese su usuario.";
    } elseif (empty($clave)) {
        $errMSG = "Por favor, ingrese su clave.";
    } elseif (strlen($clave) < 8 || strlen($clave) > 24) {
        $errMSG = "La clave debe tener entre 8 y 24 caracteres.";
    } else {
        // Verificar si el usuario ya existe en la tabla teachers
        $query = "SELECT * FROM teachers WHERE usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $errMSG = "El usuario ya existe en la tabla teachers.";
        }
    
    // Si hay un mensaje de error, lo mostramos
    if (!empty($errMSG)) {
        echo $errMSG;
        exit(); // Detener la ejecución si hay errores
    }
    
    // Aquí puedes continuar con el proceso de registro si no hay errores
    
  
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $connect->prepare("INSERT INTO teachers(dnite, nomte, sexte, correo, telet, usuario, clave, rol) VALUES(:dnite, :nomte,:sexte,:correo,:telet,:usuario,:clave,2)");
   $stmt->bindParam(':dnite',$dnite);
   $stmt->bindParam(':nomte',$nomte);
   $stmt->bindParam(':sexte',$genero);
   $stmt->bindParam(':correo',$correo);
   $stmt->bindParam(':telet',$telet);
//    $stmt->bindParam(':foto',$foto);
   $stmt->bindParam(':usuario',$usuario);
   $stmt->bindParam(':clave',$clave);
//    $stmt->bindParam(':rol',$rol);
   
   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
   }
   else
   {

    echo '<script type="text/javascript">
swal("¡Registrado!", ' . $errMSG . ', "success").then(function() {
            window.location = "mostrar";
        });
        </script>';
   }

  }
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
$consulta = "DELETE FROM `teachers` WHERE `idtea`=:idtea";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idtea', $idtea, PDO::PARAM_INT);
$idtea=trim($_POST['idtea']);
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
$idtea=trim($_POST['idtea']);
$dnite=trim($_POST['dnite']);
$nomte=trim($_POST['nomte']);
$sexte=trim($_POST['sexte']);
$correo=trim($_POST['correo']);
$telet=trim($_POST['telet']);
$usuario=trim($_POST['usuario']);
$state=trim($_POST['state']);

///////// Fin informacion enviada por el formulario /// 

////////////// Actualizar la tabla /////////
$consulta = "UPDATE teachers
SET `dnite`= :dnite, `nomte` = :nomte, `sexte` = :sexte, `correo` = :correo, `telet` = :telet,  `usuario` = :usuario, `state` = :state WHERE `idtea` = :idtea";
$sql = $connect->prepare($consulta);
$sql->bindParam(':dnite',$dnite,PDO::PARAM_STR, 25);
$sql->bindParam(':nomte',$nomte,PDO::PARAM_STR, 25);
$sql->bindParam(':sexte',$sexte,PDO::PARAM_STR,25);
$sql->bindParam(':correo',$correo,PDO::PARAM_STR,25);
$sql->bindParam(':telet',$telet,PDO::PARAM_STR,25);
$sql->bindParam(':usuario',$usuario,PDO::PARAM_STR,25);
$sql->bindParam(':state',$state,PDO::PARAM_STR,25);
$sql->bindParam(':idtea',$idtea,PDO::PARAM_INT);

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

<script>
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>
  <script type="text/javascript">
      $("#btnEndStep1").click(function () {
    $("#step1").addClass('hideMe');
    $("#step2").removeClass('hideMe');
});
$("#btnEndStep2").click(function () {
    $("#step2").addClass('hideMe');
    $("#step3").removeClass('hideMe');
});
$("#btnEndStep3").click(function () {
    // Whatever your final validation and form submission requires
    $("#sampleModal").modal("hide");
});
  </script>
  </body>
  
  </html>


