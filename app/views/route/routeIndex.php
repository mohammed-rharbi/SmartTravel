<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Route List</title>
</head>

<body>
    <h1>Route List</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Route ID</th>
                <th>Start City ID</th>
                <th>End City ID</th>
                <th>Distance</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($routes as $route) : ?>
                <tr>
                    <td><?= $route->getRouteID(); ?></td>
                    <td><?= $route->getStartCityID(); ?></td>
                    <td><?= $route->getEndCityID(); ?></td>
                    <td><?= $route->getDistance(); ?></td>
                    <td><?= $route->getDuration(); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $route->getRouteID(); ?>">Edit</a> |
                        <a href="delete.php?id=<?= $route->getRouteID(); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>

    <a href="add.php">Add New Route</a>
</body>

</html>