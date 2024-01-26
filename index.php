<?php require "components/header.php"; ?>

<div class="container">
    <div class="row justify-content-center mt-5 ">
        <div class="col-lg-3">
            <a href="/" class="btn btn-outline-warning w-100 mb-3">Home</a>
            <a href="/login.php" class="btn btn-primary w-100 mb-3">Login</a>
            <a href="/register.php" class="btn btn-success w-100 mb-3">Register</a>
            <a href="/logout.php" class="btn btn-danger w-100 mb-3">Logout</a>
        </div>
        <div class="col-lg-6">
            <div class="card card-body bg-light-subtle">
                <?php session_start(); ?>
                <?php if (isset($_SESSION['user'])) : ?>
                    <div>Welcome <?= $_SESSION['user']['name']; ?></div>
                <?php else : ?>
                    <div>Hello Please Login Account.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require "components/footer.php"; ?>