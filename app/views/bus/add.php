<!-- view/bus/add.php -->
<h2>Add New Bus</h2>

<form method="post" action="index.php?action=add" enctype="multipart/form-data">
    <label for="busNumber">Bus Number:</label>
    <input type="text" name="busNumber" required><br>

    <label for="licensePlate">License Plate:</label>
    <input type="text" name="licensePlate" required><br>

    <label for="companyID">Company ID:</label>
    <input type="text" name="companyID" required><br>

    <label for="capacity">Capacity:</label>
    <input type="text" name="capacity" required><br>

    <input type="submit" value="Add Bus">
</form>