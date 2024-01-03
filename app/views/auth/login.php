<?php
$title = "Login Page";
ob_start();
?>
<h2>
    <?php $title ?>
</h2>

<form method="post" action="index.php?action=login">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>
<p>Don't have an account? <a href="index.php?action=register">Register here</a></p>




<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>