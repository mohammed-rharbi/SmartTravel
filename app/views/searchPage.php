<!-- app/views/searchPage.php -->
<?php
$title = "Search Results";
ob_start();
?>
<!-- Div to display filtered results -->

<form id="filterForm" action="index.php?action=filterPage" method="post">
    <select class="form-control" name="Company" id="departureCity">
        <!-- Add an option to show all schedules -->
        <option value="">Show All Schedules</option>

        <!-- Populate with dynamic data from your database -->
        <?php foreach ($availableSchedules as $schedule): ?>
            <option value="<?= $schedule->getBusID()->getCompany()->getCompanyID() ?>">
                <?= $schedule->getBusID()->getCompany()->getCompanyName() ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div class="form-group">
        <label for="startDate">Start Date:</label>
        <input type="date" class="form-control" name="startDate" id="startDate">
    </div>
    <div class="form-group">
        <label for="endDate">End Date:</label>
        <input type="date" class="form-control" name="endDate" id="endDate">
    </div>
    <div class="form-group">
        <label for="Price">Price:</label>
        <input type="number" class="form-control" name="Price" id="Price" min="1">
    </div>
    <button type="button" class="btn btn-primary" id="filterButton">Filter</button>
</form>
<div id="filteredResults"></div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#filterButton').on('click', function () {
            // Serialize the form data
            var formData = $('#filterForm').serialize();

            // Make an Ajax request
            $.ajax({
                type: 'POST',
                url: 'index.php?action=filterPage', // Update the URL to your actual endpoint
                data: formData,
                success: function (data) {
                    // Update the content of the div with the filtered results
                    $('#filteredResults').html(data);
                }
            });
        });
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>