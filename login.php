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
                <form action="actions/login.php" method="POST">
                    <div class="mb-4">
                        <label for="email" class="fs-6">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="fs-6">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <button name="login" class="btn btn-primary w-100">Logoin</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "components/footer.php"; ?>