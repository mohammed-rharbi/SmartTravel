<?php
$title = "Client Page";
ob_start();
?>
<?php
var_dump($_SESSION);
?>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>