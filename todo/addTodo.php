<?php require "../components/header.php"; ?>

<?php

session_start();
$error = null;
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card card-body mt-5 bg-light">
                <form action="/actions/todo/store.php" method="POST">
                    <div class="mb-4">
                        <label for="name" class="fs-5">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                        <small class="text-danger"><?= $error; ?></small>
                    </div>

                    <button class="btn btn-sm btn-primary w-100" name="addBtn">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../components/footer.php"; ?>