<?php

namespace Addresses\Model;

class Addresses{
    private $id;
    private $address;
    private $number;
    private $neighborhood;
    private $cep;

    public function exchangeArray(array $data){
        $this->id = !empty($data['id'])?$data['id']:null;
        $this->address = !empty($data['address'])?$data['address']:null;
        $this->number = !empty($data['number'])?$data['number']:null;
        $this->neighborhood = !empty($data['neighborhood'])?$data['neighborhood']:null;
        $this->cep = !empty($data['cep'])?$data['cep']:null;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of number
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */ 
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of neighborhood
     */ 
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Set the value of neighborhood
     *
     * @return  self
     */ 
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }
}
