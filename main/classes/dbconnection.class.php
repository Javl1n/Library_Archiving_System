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
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
