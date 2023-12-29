<?php
class Pages extends Controller
{
  public function __construct()

  {
    $routeDAO = new RouteDAO();
  }

  // Load Homepage
  public function index()
  {
    // If logged in, redirect to posts
    if (isset($_SESSION['user_id'])) {
      redirect('posts');
    }


    // Load homepage/index view
    $this->view('pages/index');
  }

  public function about()
  {
    //Set Data
    $data = [
      'version' => '1.0.0'
    ];

    // Load about view
    $this->view('pages/admin', $data);
  }
}
