<?php

namespace AdCliente\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;


class AdClienteTable{
    
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getAdCliente($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }

        return $row;
    }

    public function salvarAdCliente(AdCliente $adCliente){
        $data = [
            'nome' => $adCliente->getNome(),
            // 'sobrenome' => $adCliente->getSobrenome(),
            // 'email' => $adCliente->getEmail(),
            // 'situacao' => $adCliente->getSituacao(),
        ];

        $id = (int) $adCliente->getId();
        if($id ===0){
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data,['id' => $id]);
    }

    public function deletarAdCliente($id){
        $this->tableGateway->delete(['id' => (int)$id]);
    }


}