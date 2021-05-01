<?php

namespace AdCliente\Model;

class AdCliente{
    private $id;
    private $nome;
    private $apelido;

    public function exchangeArray(array $data){
        $this->id = !empty($data['id'])?$data['id']:null;
        $this->nome = !empty($data['nome'])?$data['nome']:null;
        $this->apelido = !empty($data['apelido'])?$data['apelido']:null;
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
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of apelido
     */ 
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * Set the value of apelido
     *
     * @return  self
     */ 
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

        return $this;
    }
}