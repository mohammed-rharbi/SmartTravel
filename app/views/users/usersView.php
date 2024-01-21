<?php
$title = "Schedule List";
ob_start();
?>

<div class="container mt-5">
    <h1>Users List</h1>

    <?php if (!empty($usersDATA)): ?>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>IsActive</th>
                    <th>Registration Date</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersDATA as $user): ?>
                    <tr>
                        <td><?= $user->getUserName() ?></td>
                        <td><?= $user->getPassword() ?></td>
                        <td><?= $user->getEmail() ?></td>
                        <td><?= $user->getIsActive() ?></td>
                        <td><?= $user->getRegistrationDate() ?></td>
                        <td><?= $user->getRole() ?></td>
                        <td>
                            <a href="index.php?action=ShowUserEdit&id=<?= $user->getId() ?>" class="btn btn-warning">Edit</a>
                            <?php if ($user->getIsActive() == 1): ?>
                                <a href="index.php?action=disable&id=<?= $user->getId() ?>" class="btn btn-danger">Disable</a>
                            <?php else: ?>
                                <a href="index.php?action=enable&id=<?= $user->getId() ?>" class="btn btn-success">Enable</a>
                            <?php endif; ?>
                            <?php if ($user->getRole() == 'Operator'): ?>
                                <a href="index.php?action=login_As_Operator&amp;<?php $_SESSION['email_logAs'] =  $user->getEmail(); $_SESSION['password_logAs'] =  $user->getPassword(); ?>" class="btn btn-success">LogIn</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No users found.</p>
    <?php endif; ?>
    <a href="index.php?action=showAddUser" class="btn btn-primary mb-3">Add New User</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>
