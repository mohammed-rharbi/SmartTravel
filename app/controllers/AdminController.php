<?php

class AdminController

{    
  
    public function __construct()
    {
    }
    public function index()
    {

        // Load the home page view
        include_once 'app/views/adminPage.php';
        
    }
}