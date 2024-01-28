
<?php
$title = "Schedule List";
ob_start();
?>

			    

<div class="wrapper">

<div class="wrapper">
        <div class="body-overlay"></div>
		
        <nav class="sidebar" id="sidebar">
          <div class="sidebar-header">
          <h3><img src="img/logo.png" class="img-fluid"/><span>SAFARIA DASH</span></h3>
          </div>
          <ul class="list-unstyled components">
			  <li class="active">
        <a href="#" class="dashboard"><i class="material-icons">dashboard</i>
				<span>Dashboard</span></a>
        </li>
		
				
				 <li class="dropdown">
          <a href="index.php?action=routeindex" data-toggle="collapse" aria-expanded="false">
					<i class="material-icons">equalizer</i>
					<span>manage route</span></a>
        </li>


        <li class="dropdown">
        <a href="index.php?action=busindex" data-toggle="collapse" aria-expanded="false">
        <i class="material-icons">equalizer</i>
        <span>manage bus</span></a>
        </li>



        <li class="dropdown">
        <a href="index.php?action=scheduleindex" data-toggle="collapse" aria-expanded="false">
        <i class="material-icons">equalizer</i>
        <span>manage schuduil</span></a>
        </li>


        <li class="dropdown">
        <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false">
        <i class="material-icons">equalizer</i>
        <span>manage users</span></a>
        </li>	
    </ul>
</nav>
		

				<div class="col-md-12">
				<div class="table-wrapper">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
          <h2 class="ml-lg-2">Manage Employees</h2>
        </div>
        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
          <a href="index.php?action=schedulecreate" class="btn btn-success" data-toggle="modal">
		  <i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
          <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
		  <i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
        </div>
      </div>
    </div>
    <?php if (!empty($schedules)): ?>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>
            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
          </th>
            <th>ID</th>
                    <th>Date</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Available Seats</th>
                    <th>Bus</th>
                    <th>Route</th>
                    <th>Company Image</th>
                    <th>Price</th>
                    <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          <?php foreach ($schedules as $schedule): ?>
                    <tr>
                    <td>
            <span class="custom-checkbox">
			<input type="checkbox" id="checkbox1" name="<?= $schedule->getScheduleID() ?>" value="1">
			<label for="checkbox1"></label>
							</span>
          </td>
                        <td>
                            <?= $schedule->getScheduleID() ?>
                        </td>
                        <td>
                            <?= $schedule->getDate() ?>
                        </td>
                        <td>
                            <?= $schedule->getDepartureTime() ?>
                        </td>
                        <td>
                            <?= $schedule->getArrivalTime() ?>
                        </td>
                        <td>
                            <?= $schedule->getAvailableSeats() ?>
                        </td>
                        <td>
                            <?= $schedule->getBus()->getBusID() ?>
                        </td>
                        <td>
                            <?= $schedule->getRoute()->getStartCityName() ?> to
                            <?= $schedule->getRoute()->getEndCityName() ?>
                        </td>

                        <td>

                            <img style="width: 7rem;" src=" <?= $schedule->getCompanyImageByID($schedule->getCompanyID()) ?>"
                                alt=" <?= $schedule->getCompanyImageByID($schedule->getCompanyID()) ?>">

                        </td>
                        <td>
                            <?= $schedule->getPrice() . "DH" ?>
                        </td>
          <td>
            <a href="index.php?action=scheduleedit&id=<?= $schedule->getScheduleID() ?>" class="edit" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
            <a  href="index.php?action=scheduledelete&id=<?= $schedule->getScheduleID() ?>" class="delete" data-toggle="modal">
			<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
        <p class="text-center">No schedules found.</p>
    <?php endif; ?>
  </div>
</div>


<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Add Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-success" value="Add">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Modal HTML -->


<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" 
		  aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" value="Delete">
        </div>
      </form>
    </div>
	</div>
  </div>


	</div>			 
		</div>
		
		<!-- <footer class="footer">
			    <div class="container-fluid">
				  <div class="footer-in">
                    <p class="mb-0">&copy 2020 Vishweb design - All Rights Reserved.</p>
                </div>
				</div>
			 </footer> -->
</div>
</div>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
        
		$(document).ready(function(){
		  $(".xp-menubar").on('click',function(){
		    $('#sidebar').toggleClass('active');
			$('#content').toggleClass('active');
		  });
		  
		   $(".xp-menubar,.body-overlay").on('click',function(){
		     $('#sidebar,.body-overlay').toggleClass('show-nav');
		   });
		  
		});
		
</script>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>