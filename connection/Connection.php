<?php


class Connection
{
    private $host;
    private $db;
    private $dsn;
    private $user;
    private $pass;
    public $connection;

    public function __construct()
    {
        $this->host = 'ruraldb.chszw7u6pzg4.us-east-1.rds.amazonaws.com';
        $this->db = 'ruraldb';
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
        $this->user = 'admin';
        $this->pass = '12345678';
    }

    public function openConnection()
    {
        try
        {
            $this->connection = new PDO($this->dsn, $this->user, $this->pass);
            return $this->connection;
        }
        catch (PDOException $e)
        {
            echo 'Error: ' . $e;
            return null;
        }
    }

    public function closeConnection()
    {
        try
        {
            $this->connection = null;
            return $this->connection;
        } catch (PDOException $e)
        {
            echo 'Error: ' . $e;
            return null;
        }
    }

    public function getUsers()
    {
        try
        {
            $result = $this->connection->query("SELECT * FROM users");
            return $result;

        }catch (PDOException $e)
        {
            return 'Error: ' . $e;
        }
    }

    public function addUser($email, $name, $surname, $password, $date)
    {
        try
        {
            $result = $this->connection->query("INSERT INTO users (userID, name, surname, email, reg_date, password ) VALUES(null, '$name', '$surname', '$email', '$date', '$password')");
            return $result;
        } catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

    public function addBooking($email, $persons, $fromDate, $toDate, $price, $creationDate)
    {
        try
        {
            $result = $this->connection->query("INSERT INTO bookings (bookingID, userMail, clientAmount, fromDate, toDate, price, paid, bookingDate ) VALUES(null, '$email', '$persons', '$fromDate', '$toDate', '$price', false,'$creationDate')");
            return $result;

        }catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

    public function getBookings()
    {
        try {
            $result = $this->connection->query("SELECT * FROM bookings");
            return $result;
        } catch(PDOException $e)
        {
            echo 'Error: ' . $e;
        }

    }

    public function updateBooking($email, $persons, $fromDate, $toDate, $price, $creationDate)
    {
        try
        {
            $result = $this->connection->query("INSERT INTO bookings (bookingID, userMail, clientAmount, fromDate, toDate, price, paid, bookingDate ) VALUES(null, '$email', '$persons', '$fromDate', '$toDate', '$price', false,'$creationDate')");
            return $result;

        }catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

}
