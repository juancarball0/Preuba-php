<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save.php" method="POST" enctype="multipart/form-data">

                    

                    <div class="form-group">
                        <input type="text" placeholder="Dispositivo" name="dispositivo" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <select class="form-select" name="modelo" aria-label="Default select example" autofocus>
                            <option selected >g-1</option>
                            <option value="g-2">g-2</option>
                            <option value="g-3">g-3</option>
                            <option value="g-4">g-4</option>
                            <option value="g-5">g-5</option>
                            <option value="g-6">g-6</option>
                        
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="N° Serie" class="form-control" name="serie">
                    </div>

                    <div class="form-group">
                        <input type="file" name="photo" class="form-control" autofocus->
                    </div>
                    
                    <div>
                        <input class="btn btn-success btn-block w-100" type="submit" name="save" value="Save">
                    </div>

                </form>
            </div>
        </div>

        <div class="col-md-8">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Dispositivo</th>
                            <th>Modelo</th>
                            <th>N° Serie</th>
                            <th>Fecha</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $query = "SELECT * FROM tabla";
                        $result = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><img width="100" height="100" src="<?php echo $row['img'] ?>" alt=""></td>
                                <td><?php echo $row['dispositivo'] ?></td>
                                <td><?php echo $row['modelo'] ?></td>
                                <td><?php echo $row['serie'] ?></td>
                                <td><?php echo $row['fecha'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        
                        <?php } ?>
                    </tbody>

                </table>
        </div>

    </div>
</div>

<?php include("includes/footer.php") ?>