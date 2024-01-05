<?php
$title = "Reset Password";
ob_start();
?>
<div class="container mt-5">
    <h2>
        <?php echo $title; ?>
    </h2>
    <form action="index.php?action=reset_password_store&token=<?php echo $_GET['token']; ?>" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="token" class="form-label">Reset Token:</label>
            <input type="text" name="token" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password:</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>