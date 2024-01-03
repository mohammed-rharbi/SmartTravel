<?php
$title = "Login Page";
ob_start();
?>
<h2>
    <?php $title ?>
</h2>

<form method="post" action="index.php?action=login">
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="index.php?action=register">Register here</a></p>




<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>