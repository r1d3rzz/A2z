<?php require "../components/header.php"; ?>

<?php

require "../connect.php";

session_start();
$error = null;
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

$id = $_GET['id'];
$sql = "SELECT * FROM work WHERE id=$id";
$fetchData = mysqli_query($conn, $sql);
if ($fetchData) {
    $work = mysqli_fetch_assoc($fetchData);
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-body mt-5 bg-light">
                <form action="/actions/todo/update.php" method="POST">
                    <div class="mb-4">
                        <label for="name" class="fs-5">Name</label>
                        <input type="hidden" name="id" value="<?= $work['id']; ?>">
                        <input type="search" name="name" value="<?= $work['name']; ?>" id="name" class="form-control">
                        <small class="text-danger"><?= $error; ?></small>
                    </div>

                    <button class="btn btn-sm btn-warning w-100" name="updateBtn">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../components/footer.php"; ?>