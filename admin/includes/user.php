<?php

class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public function find_all_user()
    {

        return $this->find_this_query("select * from `users`");
    }
    public function find_user_by_id($user_id)
    {
        $result = $this->find_this_query("select * from `users` where `id`=$user_id");
        return array_shift($result);
    }
    public function find_this_query($sql)
    {
        global $database;
        $result=$database->query($sql);
        while ($row = mysqli_fetch_array($result)){
           $the_object_array[] = $this->instantiation($row);
        }
        return $the_object_array;
    }

    public function instantiation($the_record)
    {
        $user = new $this;
        foreach ($the_record as $the_attribute=>$value)
        {
            if ($user->has_the_attr($the_attribute))
            {
                $user->$the_attribute = $value;
            }
        }
        return $user;

    }
    private function has_the_attr($the_attribute)
    {
        $the_objects = get_object_vars($this);
        return array_key_exists($the_attribute,$the_objects);
    }
    public function verify_user($username,$password)
    {
        global $database;
        $sql = "select * from `users` where `username`='$username' and `password`='$password'";
        $result = $this->find_this_query($sql);
        return array_shift($result);
    }
}

$User = new User();