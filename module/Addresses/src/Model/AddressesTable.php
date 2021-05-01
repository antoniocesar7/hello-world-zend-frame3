<?php 

namespace Addresses\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class AddressesTable{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function getAll(){
        return $this->tableGateway->select();
    }

    public function getAddresses($id){
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %id', $id));
        }

        return $row;
    }

    public function salvarAddresses(Addresses $addresses){
        $data = [
            'address' => $addresses->getAddress(),
            'number' => $addresses->getNumber(),
            'neighborhood' => $addresses->getNeighborhood(),
            'cep' => $addresses->getCep(),
        ];
        



        $id = (int) $addresses->getId();
        if($id ===0){
            $this->tableGateway->insert($data);
            return;
        }

        $this->tableGateway->update($data,['id' => $id]);
    }

    
}
