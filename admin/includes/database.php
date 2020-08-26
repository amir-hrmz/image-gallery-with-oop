<?php
require_once 'config.php';
class  database
{
    public $connection;
    public  function  __construct()
    {
        $this->open_db_connection();
    }
    public function  open_db_connection(){

        $this->connection = new mysqli(db_host,db_user,db_pass,db_name);
        if ($this->connection->connect_errno){
            die('connection feild'.mysqli_connect_error());
        }

    }

    public function query($sql)
    {
        $result=mysqli_query($this->connection,$sql);
        $res=$this->confirmQuery($result);
        return $res;
    }
    private function confirmQuery($query)
    {
        if (!$query){
            die("کوئری شما غلط است");
        }
        return $query;
    }
}
$database= new database();
