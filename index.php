<?php
include ("function.php");

$objCrudAdmin = new crudApp();

if (isset($_POST["add_info"])) {
    $return_msg = $objCrudAdmin->addData($_POST);
}

$students = $objCrudAdmin->displayData();

if(isset($_GET["status"])){
    if($_GET["status"]="delete"){
        $deleteId = $_GET["id"];
        $delete_msg = $objCrudAdmin->deleteData($deleteId);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>CRUD APP</title>
</head>

<body>
    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index.php">IT Student Database</a></h2>
        <?php if (isset($delete_msg)) {
                echo $delete_msg;
            } ?>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <?php if (isset($return_msg)) {
                echo $return_msg;
            } ?>
            <input type="text" name="std_name" id="" placeholder="Enter Your Name" class="form-control mb-2">
            <input type="number" name="std_roll" id="" placeholder="Enter Your Roll" class="form-control mb-2">
            <label for="image">Upload Your Image</label>
            <input type="file" name="std_img" id="" class="form-control mb-2">
            <input type="submit" value="Add Information" name="add_info"
                class="form-control bg-warning text-white fs-5">
        </form>
    </div>
    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($student = mysqli_fetch_assoc($students)) { ?>
                    <tr>
                        <td>
                            <?php echo $student["id"]; ?>
                        </td>
                        <td><?php echo $student["std_name"]; ?></td>
                        <td><?php echo $student["std_roll"]; ?></td>
                        <td><img
                        style="height: 100px" src="upload/<?php echo $student["std_img"]; ?>"></td>
                        <td>
                            <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student["id"]; ?>">Edit</a>
                            <a class="btn btn-warning"href="?status=delete&&id=<?php echo $student["id"]; ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
</body>

</html>