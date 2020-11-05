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
            $statement= $this->connection->prepare("SELECT * FROM users");
            $statement->execute();
            $result = $statement->fetchAll();
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
            $statement = $this->connection->prepare("INSERT INTO users (userID, name, surname, email, reg_date, password ) VALUES(?, ?, ?, ?, ?, ?)");
            $statement->execute(array(
                null,
                $name,
                $surname,
                $email,
                $date,
                $password

            ));
        } catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

    public function addBooking($email, $persons, $fromDate, $toDate, $price, $creationDate)
    {
        try
        {
            $statement = $this->connection->prepare("INSERT INTO bookings (bookingID, userMail, clientAmount, fromDate, toDate, price, paid, bookingDate ) VALUES(?, ?, ?, ?, ?, ?, ?,?)");
            $statement->execute(array(
                null,
                $email,
                $persons,
                $fromDate,
                $toDate,
                $price,
                false,
                $creationDate

            ));

        }catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

    public function getBookings()
    {
        try {
            $statement= $this->connection->prepare("SELECT * FROM bookings");
            $statement->execute();
            $result = $statement->fetchAll();
            return $result;
        } catch(PDOException $e)
        {
            echo 'Error: ' . $e;
        }

    }

    public function updateBooking($booking)
    {
        try
        {
            $query = "UPDATE bookings SET paid=true WHERE userMail=?, fromDate=?, toDate=? ";
            $result = $this->connection->prepare($query);
            $result->execute(array(
                $booking[0],
                $booking[2],
                $booking[3]

            ));

        }catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

    public function deleteBooking($b)
    {
        try
        {
            $query = 'DELETE FROM bookings WHERE userEmail=? AND paid=false';
            $result = $this->connection->prepare($query);
            $result->execute(array(
                $b['email']
            ));
        }
        catch (PDOException $e)
        {
            echo 'Error: ' . $e;
        }
    }

}
