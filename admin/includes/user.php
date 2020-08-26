<?php

class User
{
    public static function find_all_user()
    {

        return self::find_this_query("select * from `users`");
    }
    public static function find_user_by_id($user_id)
    {
        $result = self::find_this_query("select * from `users` where `id`=$user_id");
        $row= mysqli_fetch_array($result);
        return $row;
    }
    public static function find_this_query($sql)
    {
        global $database;
        $result=$database->query($sql);
        return $result;
    }
}