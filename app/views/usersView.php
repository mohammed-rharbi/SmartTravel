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
                    <th>password</th>
                    <th>email</th>
                    <th>isActive</th>
                    <th>AregistrationDate</th>
                    <th>role</th>
                    <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($usersDATA as $user): ?>
    <tr>
        <td>
            <?= $user->getUserName() ?>
        </td>
        <td>
            <?= $user->getPassword() ?>
        </td>
        <td>
            <?= $user->getEmail() ?>
        </td>
        <td>
            <?= $user->getIsActive() ?>
        </td>
        <td>
            <?= $user->getRegistrationDate() ?>
        </td>
        <td>
            <?= $user->getRole() ?>
        </td>
        <td>
            <a href="index.php?action=scheduleedit&id=<?= $user->getId() ?>"
                class="btn btn-warning">Edit</a>
            <a href="index.php?action=disable&id=<?= $user->getId() ?>"
                class="btn btn-danger">Disable</a>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php else: ?>
        <p class="text-center">No schedules found.</p>
    <?php endif; ?>
    <a href="index.php?action=showAddUser" class="btn btn-primary mb-3">Add New User</a>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>


