<?php

class User
{

    public function find_all_user()
    {
        global $database;
        $result=$database->query("select * from `users`");
        return $result;
    }

    public function find_user_by_id($user_id)
    {
        global $database;

        $result = $database->query("select * from `users` where `id`=$user_id");
        $row= mysqli_fetch_array($result);
        return $row;

    }


}