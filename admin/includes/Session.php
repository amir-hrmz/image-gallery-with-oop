<?php

class Session
{
    public function is_signed_id()
    {
        return false;
    }
    public function login()
    {
        echo "login";
    }
}

$session = new Session();