<?php
include_once('dbconnection.php');

class user extends dbconnection
{

    public function __construct()
    {
        parent::connect();
    }

    public function check_login($id, $password)
    {

        $sql = "SELECT * FROM  WHERE id = '$id' AND password = '$password'";
        $query = $this->connection->query($sql);

        if ($query->num_rows > 0) {
            $user = $query->fetch_array();
            return $user['id'];
        } else {
            return false;
        }
    }

    public function user_info()
    {
    }
}
