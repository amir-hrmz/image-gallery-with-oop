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
        $row= mysqli_fetch_array($result);
        return $row;
    }
    public function find_this_query($sql)
    {
        global $database;
        $result=$database->query($sql);
        return $result;
    }

    public function instantiation($the_record)
    {
        $user = new $this;
        $user->id = $the_record['id'];
        $user->username = $the_record['username'];
        $user->password = $the_record['password'];
        $user->first_name = $the_record['first_name'];
        $user->last_name = $the_record['last_name'];
        return $user;
    }
}
$User=new User();