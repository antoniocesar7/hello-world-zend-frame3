<?php

namespace AnCategoria\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;


class AnCategoriaTable{
    
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getAnCategoria($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }

        return $row;
    }

    public function salvarAnCategoria(AnCategoria $anCategoria){
        $data = [
            'descricao' => $anCategoria->getDescricao(),
            'codigo' => $anCategoria->getCodigo(),
            'chave' => $anCategoria->getChave(),
            
        ];

        $id = (int) $anCategoria->getId();
        if($id ===0){
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data,['id' => $id]);
    }

    public function deletarAnCategoria($id){
        $this->tableGateway->delete(['id' => (int)$id]);
    }


}