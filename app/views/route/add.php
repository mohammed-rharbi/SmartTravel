<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Route</title>
</head>

<body>
    <h1>Add New Route</h1>

    <form action="index.php" method="post">
        <label for="startCityID">Start City ID:</label>
        <input type="text" id="startCityID" name="startCityID" required>

        <br>

        <label for="endCityID">End City ID:</label>
        <input type="text" id="endCityID" name="endCityID" required>

        <br>

        <label for="distance">Distance:</label>
        <input type="text" id="distance" name="distance" required>

        <br>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required>

        <br>

        <input type="submit" value="Add Route">
    </form>

    <br>

    <a href="index.php">Back to Route List</a>
</body>

</html>