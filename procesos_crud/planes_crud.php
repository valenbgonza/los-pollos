<?php
$codigo = $_POST[´txt_plan_id´];
echo $codigo;
$sql = "SELECT * FROM planes WHERE plan_id = '$codigo'";
require_once("conexion.php");
$ejecutar = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Planes</title>
</head>
<body>
    <div class="container">
        <section class="row">
            <div class="col-6">
                <h1>Editar Plan</h1>
                <form action="" method="post" class="border"> 
                    <label for="">Plan Id</label>
                    <input type="number" name="" id="" readonly
                    class="form-control"
                    value="<?=$codigo;?>">



                </form>
            </div>
        </section>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>