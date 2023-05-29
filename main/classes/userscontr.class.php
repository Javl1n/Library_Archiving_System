<?php

class UsersContr extends users
{
    public function createUser($user_id, $first_name, $middle_name, $last_name, $password)
    {
        $this->setUser($user_id, $first_name, $middle_name, $last_name, $password);
    }
}
