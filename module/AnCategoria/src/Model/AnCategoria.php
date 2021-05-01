<?php

namespace AnCategoria\Model;

class AnCategoria{
    private $id;
    private $descricao;
    private $codigo;
    private $chave;

    public function exchangeArray(array $data){
        $this->id        = !empty($data['id'])?$data['id']:null;
        $this->descricao      = !empty($data['descricao'])?$data['descricao']:null;
        $this->codigo = !empty($data['codigo'])?$data['codigo']:null;
        $this->chave     = !empty($data['chave'])?$data['chave']:null;
        
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

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of chave
     */ 
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * Set the value of chave
     *
     * @return  self
     */ 
    public function setChave($chave)
    {
        $this->chave = $chave;

        return $this;
    }
}