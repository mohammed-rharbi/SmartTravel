<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
</head>

<body>
    <h1>Edit Schedule</h1>

    <form action="index.php" method="post">
        <input type="hidden" name="scheduleID" value="<?= $schedule->getScheduleID(); ?>">

        <label for="date">Date:</label>
        <input type="text" id="date" name="date" value="<?= $schedule->getDate(); ?>" required>

        <br>

        <label for="departureTime">Departure Time:</label>
        <input type="text" id="departureTime" name="departureTime" value="<?= $schedule->getDepartureTime(); ?>"
            required>

        <br>

        <label for="arrivalTime">Arrival Time:</label>
        <input type="text" id="arrivalTime" name="arrivalTime" value="<?= $schedule->getArrivalTime(); ?>" required>

        <br>

        <label for="availableSeats">Available Seats:</label>
        <input type="text" id="availableSeats" name="availableSeats" value="<?= $schedule->getAvailableSeats(); ?>"
            required>

        <br>

        <label for="busID">Bus ID:</label>
        <input type="text" id="busID" name="busID" value="<?= $schedule->getBusID(); ?>" required>

        <br>

        <label for="routeID">Route ID:</label>
        <input type="text" id="routeID" name="routeID" value="<?= $schedule->getRouteID(); ?>" required>

        <br>

        <input type="submit" value="Update Schedule">
    </form>

    <br>

    <a href="index.php">Back to Schedule List</a>
</body>

</html>