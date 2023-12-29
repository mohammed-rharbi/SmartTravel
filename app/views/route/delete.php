<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Route</title>
</head>

<body>
    <h1>Delete Route</h1>

    <p>Are you sure you want to delete the route with ID <?= $route->getRouteID(); ?>?</p>

    <form action="index.php" method="post">
        <input type="hidden" name="routeID" value="<?= $route->getRouteID(); ?>">

        <input type="submit" value="Yes, Delete">
    </form>

    <br>

    <a href="index.php">No, Go Back</a>
</body>

</html>