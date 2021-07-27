<?php

class Conn
{
    function connection(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        try 
        {
            $conn = new PDO("mysql:host=$servername;dbname=guestbook", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "CONNECTED successfully";
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }

}

$class = new Conn();
$conn = $class->connection();