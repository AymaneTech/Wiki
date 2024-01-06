<?php
namespace App\Core;
use PDO;
use PDOException;
class Database
{
    private static $instance = null;
    private $conn;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $dbname = DB_NAME;
    private $dbh;
    private function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
    }
    public static function getInstance()
    {
        if (self::$instance === null) { self::$instance = new Database; }
        return self::$instance;
    }
    public function connect() { return $this->dbh; }
}

