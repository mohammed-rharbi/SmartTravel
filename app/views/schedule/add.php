<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Schedule</title>
</head>

<body>
    <h1>Add New Schedule</h1>

    <form action="index.php" method="post">
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" required>

        <br>

        <label for="departureTime">Departure Time:</label>
        <input type="text" id="departureTime" name="departureTime" required>

        <br>

        <label for="arrivalTime">Arrival Time:</label>
        <input type="text" id="arrivalTime" name="arrivalTime" required>

        <br>

        <label for="availableSeats">Available Seats:</label>
        <input type="text" id="availableSeats" name="availableSeats" required>

        <br>

        <label for="busID">Bus ID:</label>
        <input type="text" id="busID" name="busID" required>

        <br>

        <label for="routeID">Route ID:</label>
        <input type="text" id="routeID" name="routeID" required>