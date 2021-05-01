<?php

namespace AnCategoriaVal\Model;

class AnCategoriaVal{
    private $id;
    private $descricao;

    public function exchangeArray(array $data){
        $this->id        = !empty($data['id'])?$data['id']:null;
        $this->descricao      = !empty($data['descricao'])?$data['descricao']:null;
        
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
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
}