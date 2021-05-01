<?php

namespace Produto\Model;

use RuntimeException;

use Zend\Db\TableGateway\TableGatewayInterface;

class ProdutoTable{
   
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getProduto($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi possível encontrar o id %d',$id));
        }
        
        return $row;
    }

    public function salvarProduto(Produto $produto){
        $data = [
            'nome'      => $produto->getNome(),
            'tipo'      => $produto->getTipo(),
            'situacao'  => $produto->getSituacao(),
        ];

        $id = (int) $produto->getId();
        if($id ===0){
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data,['id' => $id]);
    }

    
}