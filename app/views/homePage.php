<?php
$title = "Home";
ob_start();
?>



<header id="header">
<img class="mt-5" 
src="imgs/header-illustration-2.png"
alt="travel"
width="650">
</header>



<div class="d-flex justify-content-center align-items-center">
<form action="index.php?action=searchPage"
method="POST"
id="booking" 
class="container rounded-5 row g-3 needs-validation p-4 mt-3 border border-black" novalidate>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
      <label for="validationCustom02" class="form-label">Departure city</label>
      <select  class="form-control" data-mdb-select-init data-mdb-filter="true" name="departureCity" id="departureCity">
        <?php foreach ($Cites->getAllCities() as $city): ?>
                <option value="<?= $city->getCityID() ?>">
                    <?= $city->getCityName()?>
                </option>
            <?php endforeach; ?>
      </select> 
      </div>
  </div>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
      <label for="validationCustom02" class="form-label">Destination city</label>
      <select  class="form-control" data-mdb-select-init data-mdb-filter="true" name="arrivalCity" id="arrivalCity">
      <?php foreach ($Cites->getAllCities() as $city): ?>
                <option value="<?= $city->getCityID() ?>">
                    <?= $city->getCityName()?>
                </option>
            <?php endforeach;?>
      </select> 
      </div>
  </div>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
    <label for="travelDate" class="form-label">Date</label>
    <input type="date" class="form-control" name="travelDate" id="travelDate" required>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-outline" data-mdb-input-init>
      <label for="numPeople" class="form-label">Number Of Passengers</label>
      <select  class="form-control" data-mdb-select-init data-mdb-filter="true" name="numPeople" id="numPeople">
        <option value="1">1 person</option>
        <option value="2">2 people</option>
        <option value="3">3 people</option>
        <option value="4">4 people</option>
        <option value="5">5 people</option>
        <option value="6">6 people</option>
        <option value="7">7 people</option>
        <option value="8">8 people</option>
      </select> 
      </div>
  </div>
  <div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-outline-light btn-rounded mt-3" data-mdb-ripple-init  data-mdb-ripple-color="dark">Search</button>
  </div>
</form>
</div>


<section class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-8 mt-5">
            <h2 class="mb-4 text-orange">About Our Website</h2>
            <p class="lead">Welcome to our travel website!</p>
            <p class="text-muted">We aim to provide you with a seamless travel experience, offering a wide range of travel options, schedules, and destinations. Our user-friendly platform allows you to easily search for routes, check schedules, and book tickets hassle-free.</p>
            <p class="text-muted">Whether you're planning a short trip or a long journey, we're here to make your travel plans convenient and enjoyable. With our extensive network and reliable services, embark on your next adventure stress-free.</p>
        </div>
        <div class="col-md-4">
            <img src="imgs\2483557-removebg-preview.png" alt="Website Image" class="img-fluid rounded">
        </div>
    </div>
</section>


<div id="testimonialCarousel" class=" carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">John Doe</h5>
                            <p class="card-text">"Great experience traveling by bus. Comfortable seats and a smooth journey."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jane Smith</h5>
                            <p class="card-text">"Fantastic service! Prompt and courteous staff, highly recommended."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Additional carousel items with different testimonials -->
        <div class="carousel-item">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Another Person</h5>
                            <p class="card-text">"Astonishing travel experience. Brilliant service and remarkable comfort."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Someone Else</h5>
                            <p class="card-text">"Absolutely loved the journey. Top-notch facilities and excellent staff."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>






<div class="subscribe mt-5">
    <h2 class="text-center mt-5 mb-4 fw-bold">Explore, Dream, and Travel with Safaria</h2>
    <div class="container" style="width: 60%;">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="border-radius: 20px !important;">
                <div class="carousel-item active">
                    <img src="imgs/moroccoguide.jpg" class="d-block w-100 img-fluid" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Discover Amazing Destinations</h5>
                        <p>Explore breathtaking landscapes and vibrant cultures across the globe.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="imgs/moroccoguide.jpg" class="d-block w-100 img-fluid" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Immerse in Rich Traditions</h5>
                        <p>Experience the essence of different cultures and traditions during your travels.</p>
                    </div>
                </div>
                <!-- Add more carousel items and respective captions -->
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="fa-solid fa-forward fa-rotate-180 fa-2xl" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="fa-solid fa-forward fa-2xl" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>