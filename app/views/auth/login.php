<?php
$title = "Login Page";
ob_start();
?>

<div class="container mt-5">
    <form action="index.php?action=login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="mt-3">
        <p>Forgot your password? <a href="index.php?action=forgot_password">Reset it here</a>.</p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>