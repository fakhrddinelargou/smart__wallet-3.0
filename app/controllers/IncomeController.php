<?php 

class IncomeController extends Controller{


 public function index(){
    $this->view("layout/app",
    [
        "main" => "/../incomes/index.php"
    ]
    );
 }

}


?>