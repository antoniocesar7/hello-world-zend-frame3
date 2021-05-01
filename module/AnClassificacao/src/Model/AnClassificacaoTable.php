<?php

namespace AnClassificacao\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;


class AnClassificacaoTable{
    
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getAnClassificacao($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }

        return $row;
    }

    public function salvarAnClassificacao(AnClassificacao $anClassificacao){
        $data = [
            'descricao' => $anClassificacao->getDescricao(),
            'codigo'    => $anClassificacao->getCodigo(),
            
        ];

        $id = (int) $anClassificacao->getId();
        if($id ===0){
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data,['id' => $id]);
    }

    public function deletarAnClassificacao($id){
        $this->tableGateway->delete(['id' => (int)$id]);
    }


}