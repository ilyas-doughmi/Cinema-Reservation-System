<?php
class db
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "cinema_reservation";

    protected function connect()
    {
        try {
            $pdo = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->user,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            return $pdo;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
