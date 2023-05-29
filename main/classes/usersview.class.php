<?php

class UsersView extends users
{
    public function showUser($user_id)
    {
        $results = $this->getUser($user_id);
        return $results;
    }

    public function showStudent($user_id)
    {
        $results = $this->getStudent($user_id);
        return $results;
    }
}
