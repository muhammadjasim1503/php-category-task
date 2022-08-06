<?php

class Product{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "phpoop_3";

    public $con;

    public function __construct() {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
        if(mysqli_connect_error()){
            trigger_error("Failed to connect to mysqli: ". mysqli_connect_error());
        } else {
            return $this->con;
        }
    }

    public function displayProducts(){
        $query = "SELECT * FROM products";
        $result = $this->con->query($query);

        if ($result->num_rows>0){
            $data = [];
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
        }else {
            echo "No record found!";
        }
    }
}