<?php
class dbconnection
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'library_archiving_system';

    protected $connection;

    public function connect()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }
        return $this->connection;
    }
}
