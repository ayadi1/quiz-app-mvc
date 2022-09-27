<?php

namespace App\Connection;
use PDO;
class Db
{
    private string $userName = 'root';
    private string $password = '';
    private string $servername = 'localhost';
    private  string $db_name = 'quiz_db';

    public function connection() : PDO
    {
        $conn = new PDO("mysql:host=localhost;dbname=quiz_db", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $conn;
    }
}