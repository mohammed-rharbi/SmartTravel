<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Route</title>
</head>

<body>
    <h1>Edit Route</h1>

    <form action="index.php" method="post">
        <input type="hidden" name="routeID" value="<?= $route->getRouteID(); ?>">

        <label for="startCityID">Start City ID:</label>
        <input type="text" id="startCityID" name="startCityID" value="<?= $route->getStartCityID(); ?>" required>

        <br>

        <label for="endCityID">End City ID:</label>
        <input type="text" id="endCityID" name="endCityID" value="<?= $route->getEndCityID(); ?>" required>

        <br>

        <label for="distance">Distance:</label>
        <input type="text" id="distance" name="distance" value="<?= $route->getDistance(); ?>" required>

        <br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" value="<?= $route->getDuration(); ?>" required>

        <br>

        <input type="submit" value="Update Route">
    </form>

    <br>

    <a href="index.php">Back to Route List</a>
</body>

</html>