<?php
include ("function.php");

$objCrudAdmin = new crudApp();


$students = $objCrudAdmin->displayData();

if (isset($_GET["status"])) {
    if ($_GET["status"] = "edit") {
        $id = $_GET["id"];
        $returnData = $objCrudAdmin->displayDataById($id);
    }
}

if (isset($_POST["edit_btn"])) {
    $msg = $objCrudAdmin->updateData($_POST);
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
        <h2><a style="text-decoration: none;" href="index.php">DarunIT Student Database</a></h2>
        <form action="" method="post" enctype="multipart/form-data" class="form">
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
            <input type="text" name="u_std_name" id="" value="<?php echo $returnData["std_name"]; ?>"
                class="form-control mb-2">
            <input type="number" name="u_std_roll" id="" value="<?php echo $returnData["std_roll"]; ?>"
                class="form-control mb-2">
            <label for="image">Upload Your Image</label>
            <input type="file" name="u_std_img" id="" class="form-control mb-2">
            <input type="hidden" name="std_id" value="<?php echo $returnData["id"]; ?>">
            <input type="submit" value="Update Information" name="edit_btn"
                class="form-control bg-warning text-white fs-5">
        </form>
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