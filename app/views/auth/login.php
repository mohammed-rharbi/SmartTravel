<?php
$title = "Login Page";
ob_start();
?>

<div class="container mt-5">
    <h2>
        <?php echo $title; ?>
    </h2>
    <form action="index.php?action=login_store" method="post" class="mt-3">
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
    <p class="mt-3">Forgot your password? <a href="index.php?action=forget_password">Reset it here</a>.</p>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>