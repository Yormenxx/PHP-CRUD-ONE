


<?php include("../../connection.php"); 


if(isset($_GET['id'])){
    $txtid=(isset($_GET['id']) ? $_GET['id'] :'');
    $stm = $connect->prepare('SELECT * FROM contactos WHERE id=:txtid');
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    $registro = $stm->fetch(PDO::FETCH_LAZY);
    $nombre = $registro["nombre"];
    $telefono = $registro["telefono"];
    $fecha = $registro["fecha"];
    
}

if($_POST){
    $txtid=(isset($_POST["txtid"])?$_POST["txtid"]:"");
    $nombre =(isset($_POST["nombre"])?$_POST["nombre"]:"");
    $telefono =(isset($_POST["telefono"])?$_POST["telefono"]:"");
    $fecha =(isset($_POST["fecha"])?$_POST["fecha"]:"");

    $stm =$connect->prepare('UPDATE contactos SET nombre=:nombre, telefono=:telefono, fecha=:fecha WHERE id=:txtid ');

    $stm->bindParam(':nombre',$nombre);
    $stm->bindParam(':telefono',$telefono);
    $stm->bindParam(':fecha',$fecha);
    $stm->bindParam(':txtid',$txtid);
    $stm->execute();

    header("location:index.php");
}



?>




<?php include_once("../../template/header.php") ?>
<form action="" method="post" class="px-5 mx-5">
      <div class="modal-body">

      <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid ?>" placeholder="Ingresar nombre" id="">

        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" placeholder="Ingresar nombre" id="">
        <label for="">Telefono</label>
        <input type="text" class="form-control" name="telefono" value="<?php echo $telefono?>" placeholder="Ingresar telefono" id="">

        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $fecha?>" placeholder="Ingresar fecha" id="">

    
      </div>
      <div class="modal-footer py-2">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary ">Actualizar</button>
      </div>
      </form>





      <?php include_once("../../template/footer.php") ?>







