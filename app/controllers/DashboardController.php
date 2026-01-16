<?php

class DashboardController extends Controller{

public function index(){
    $this->view("layout/app",
    [
        'main' => "/../dashboard/index.php" 
    ]
    );
}
}