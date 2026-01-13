<?php 

class Database {
    private $host;
    private $db_name;
    private $user_name;
    private $password;
    public $connect = null;

    public function __construct(){
        $this->host = '127.0.0.1';
        $this->db_name = 'smart_wallet';
        $this->user_name = 'postgres';
        $this->password = 'admin@123';
    }

    public  function connection(){
        if($this->connect === null){
           $this->connect = new PDO(
                "pgsql:host={$this->host};port=5432;dbname={$this->db_name}",
                $this->user_name,
                $this->password

            );
             $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->connect;

    }


}

