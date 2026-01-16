<?php 

class ExpenseController extends Controller{


 public function index(){
    $this->view("layout/app",
    [
        "main" => "/../expenses/index.php"
    ]
    );
 }

}


?>