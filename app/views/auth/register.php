<?php
$title = "Register Page";
ob_start();
?>

<h2>
    <?php $title ?>
</h2>

<form method="post" action="index.php?action=register">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="index.php?action=login">Login here</a></p>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>