<?php

class Choriste
{
    public $choristeId;
    private $firstName;
    private $lastName;
    private $sexe;
    private $email;
    private $address;
    private $telephone;
    private $company;
    private $isPresent = false;

    public function __construct(string $firstName, string $lastName, string $sexe, string $email, string $address, string $telephone, string $company)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->sexe = $sexe;
        $this->email = $email;
        $this->address = $address;
        $this->telephone = $telephone;
        $this->company = $company;
    }

    public function getFistName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getSexe()
    {
        return $this->sexe;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getCompany()
    {
        return $this->company;
    }
    public function isPresent()
    {
        return $this->isPresent;
    }
}
