<?php

namespace AdPlano\Model;

class AdPlano{
    
   private $id;
   private $nome;
   private $descricao;

  
    public function exchangeArray(array $data){
        $this->id        = !empty($data['id'])?$data['id']:null;
        $this->nome      = !empty($data['nome'])?$data['nome']:null;
        $this->descricao = !empty($data['descricao'])?$data['descricao']:null;
        
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