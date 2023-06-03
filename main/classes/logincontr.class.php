<?php
class logincontr extends login
{
    private $user_id;
    private $password;

    public function __construct($user_id, $password)
    {
        $this->user_id = $user_id;
        $this->password = $password;
    }

    public function loginUser()
    {
        $this->getUser($this->user_id, $this->password);
    }
}
