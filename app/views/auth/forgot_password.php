<?php
$title = "Forget Password";
ob_start();
?>

<div class="container mt-5">
    <h2>
        <?php echo $title; ?>
    </h2>
    <form action="index.php?action=forget_password_store" method="post" class="mt-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>