<?php

class Booking
{
    private $userMail;
    private $clientAmount;
    private $fromDate;
    private $toDate;
    private $price;


    public function __construct($userMail, $clientAmount, $fromDate, $toDate, $price)
    {
        $this->userMail = $userMail;
        $this->clientAmount = $clientAmount;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->price = $price;
    }


    public function getUserMail()
    {
        return $this->userMail;
    }

    public function setUserMail($userMail)
    {
        $this->userMail = $userMail;
    }

    public function getClientAmount()
    {
        return $this->clientAmount;
    }

    public function setClientAmount($clientAmount)
    {
        $this->clientAmount = $clientAmount;
    }

    public function getFromDate()
    {
        return $this->fromDate;
    }

    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    public function getToDate()
    {
        return $this->toDate;
    }

    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }




}