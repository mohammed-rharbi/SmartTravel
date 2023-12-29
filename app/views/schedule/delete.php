<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Schedule</title>
</head>

<body>
    <h1>Delete Schedule</h1>

    <p>Are you sure you want to delete the schedule with ID <?= $schedule->getScheduleID(); ?>?</p>

    <form action="index.php" method="post">
        <input type="hidden" name="scheduleID" value="<?= $schedule->getScheduleID(); ?>">

        <input type="submit" value="Yes, Delete">
    </form>

    <br>

    <a href="index.php">No, Go Back</a>
</body>

</html>