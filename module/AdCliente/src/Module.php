<?php

namespace AdCliente;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use AdCliente\Controller\AdClienteController;

class Module implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__."/../config/module.config.php";
    }

   
   
    public function getServiceConfig(){
        return [
            'factories' => [
                Model\AdClienteTable::class => function($container){
                    $tableGateway = $container->get(Model\AdClienteTableGateway::class);
                    return new Model\AdClienteTable($tableGateway);
                },

                Model\AdClienteTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();

                    $resultSetPrototype->setArrayObjectPrototype(new Model\AdCliente());
                    return new TableGateway('ad_cliente',$dbAdapter,null,$resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig(){
        return[
            'factories' => [
                AdClienteController::class => function($container){
                    $tableGateway = $container->get(Model\AdClienteTable::class);
                    return new AdClienteController($tableGateway);
                },
            ]
        ];
    }

}