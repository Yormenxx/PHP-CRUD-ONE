


<?php include("../../connection.php");

$stm = $connect ->prepare('SELECT * FROM contactos');
$stm -> execute();
$contacts  = $stm->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id'])){
    $txtid=(isset($_GET['id']) ? $_GET['id'] :'');
    $stm = $connect->prepare('DELETE FROM contactos WHERE id=:txtid');
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();

    header("location:index.php");
}





?>


<?php include_once("../../template/header.php") ?>
<button type="button" class="btn btn-primary m-5" data-toggle="modal" data-target="#create">
  Nuevo
</button>

<div
    class="table-responsive px-5"
>
    <table
        class="table border border-secondary rounded"
    >
        <thead class="table table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($contacts as $contact){ ?>
        
            <tr class="">
                <td scope="row"><?php echo $contact["id"]; ?></td>
                <td><?php echo $contact["nombre"]; ?></td>
                <td><?php echo $contact["telefono"]; ?></td>
                <td><?php echo $contact["fecha"]; ?></td>
                <td>
                <a href="edit.php?id=<?php echo $contact["id"];?>" class="btn btn-success">Editar</a>
                <a href="index.php?id=<?php echo $contact["id"];?>" class="btn btn-danger">Eliminar</a>

                </td>
             </tr>
        
       <?php } ?>
        
          
        </tbody>
    </table>
</div>

<?php include("create.php") ?>







<?php include_once("../../template/footer.php") ?>