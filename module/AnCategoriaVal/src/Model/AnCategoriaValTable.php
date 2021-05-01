<?php

namespace AnCategoriaVal\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;


class AnCategoriaValTable{
    
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getAnCategoriaVal($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }

        return $row;
    }

    public function salvarAnCategoriaVal(AnCategoriaVal $anCategoriaVal){
        $data = [
            'descricao' => $anCategoriaVal->getDescricao(),
            // 'sobrenome' => $AnCategoriaVal->getSobrenome(),
            // 'email' => $AnCategoriaVal->getEmail(),
            // 'situacao' => $AnCategoriaVal->getSituacao(),
        ];

        $id = (int) $anCategoriaVal->getId();
        if($id ===0){
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data,['id' => $id]);
    }

    public function deletarAnCategoriaVal($id){
        $this->tableGateway->delete(['id' => (int)$id]);
    }


}