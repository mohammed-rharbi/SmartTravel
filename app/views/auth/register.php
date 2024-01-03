<?php
$title = "Register Page";
ob_start();
?>

<h2>
    <?php echo $title; ?>
</h2>

<form method="post" action="index.php?action=register">
    <label>Username:</label>
    <input type="text" name="username" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Password:</label>
    <input type="password" name="password" required>
    <br>
    <label>Full Name:</label>
    <input type="text" name="fullName" required>
    <br>
    <button type="submit">Register</button>
</form>
<p>Already have an account? <a href="index.php?action=login">Login here</a></p>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>