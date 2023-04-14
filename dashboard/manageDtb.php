<?php
class rowClass{
    private $conn;

    private $columns = array();

    function __construct(){
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = 'root';
        $db_name = 'moviedb';
        $this->conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);
        $result = $this->conn->query("SHOW COLUMNS FROM content");
        while ($row = $result->fetch_assoc()) {
            $this->columns[] = new clValues($row['Field']);
        }
    }

    public function getColumn($columnNmb){
        return $this->columns[$columnNmb]->getColumn();
    }






}


class clValues{
    private $column;

    private $value;

    public function __construct($column){
        $this->column = $column;
    }

    public function setClValue($value){
        $this->value = $value;
    }

    public function getColumn(){
        return $this->column;
    }


}







?>