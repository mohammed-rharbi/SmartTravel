<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <h1 class="mt-5">Welcome to SmartTravel!</h1>
    <p>Explore and book your bus trips with ease.</p>
    <?php $Cites = new cityDAO();?>

    <!-- Search Form -->
    <h2 class="mt-4">Search for Bus Trips</h2>
    <form action="search.php" method="GET">
        <div class="form-group">
            <label for="departureCity">Departing City:</label>
            <select class="form-control" name="departureCity" id="departureCity">
                <!-- Populate with dynamic data from your database -->
                <?php foreach ($Cites->getAllCities() as $city) : ?>
                <option value="<?= $selected = $city->getCityID() ?>" name="sel"><?= $city->getCityName() ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="arrivalCity">Arrival City:</label>
            <select class="form-control" name="arrivalCity" id="arrivalCity">
                <!-- Populate with dynamic data from your database -->
                <?php $id = $_POST['sel']; ?>
                <?php foreach ($Cites->getAllCities() as $city) : {
            if ($city->getCityID() != $id) : ?>
                <option value="<?= $city->getCityID() ?>" name="sel"><?= $city->getCityName() ?></option>
                <?php endif;
          } ?>
                <?php
        endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="travelDate">Travel Date:</label>
            <input type="date" class="form-control" name="travelDate" id="travelDate">
        </div>

        <div class="form-group">
            <label for="numPeople">Number of People:</label>
            <input type="number" class="form-control" name="numPeople" id="numPeople" min="1">
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Add more dynamic content as needed -->
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>