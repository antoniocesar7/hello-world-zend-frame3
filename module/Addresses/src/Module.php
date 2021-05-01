<?php

namespace Addresses;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Addresses\Controller\AddressesController;

class Module implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__."/../config/module.config.php";
    }

    public function getServiceConfig(){
        return[
            'factories' => [
                Model\AddressesTable::class => function($container){
                    $tableGateway = $container->get(Model\AddressesTableGateway::class);
                    return new Model\AddressesTable($tableGateway);
                },

                Model\AddressesTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Addresses());
                    return new TableGateway('addresses',$dbAdapter,null,$resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig(){
        return[
            'factories' => [
                AddressesController::class => function($container){
                    $tableGateway = $container->get(Model\AddressesTable::class);
                    return new AddressesController($tableGateway);
                },
            ]
        ];
    }
}
