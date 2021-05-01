<?php

namespace AgenciaCorreio;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use AgenciaCorreio\Controller\AgenciaCorreioController;
class AgenciaCorreio implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__."/../config/module.config.php";
    }

    public function getServiceConfig(){
        return[
            'factories' => [
                Model\AgenciaCorreioTable::class => function($container){
                    $tableGateway = $container->get(Model\AgenciaCorreioTableGateway::class);
                    return new Model\AgenciaCorreioTable($tableGateway);
                },
                
                Model\AgenciaCorreioTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\AgenciaCorreio());
                    return new TableGateway('agencia_correio',$dbAdapter,null,$resultSetPrototype);
                },
            ],
        ];
    
    }

    public function getControllerConfig(){
        return[
            'factories' => [
                AgenciaCorreioController::class => function($container){
                    $tableGateway = $container->get(Model\AgenciaCorreioTable::class);
                    return new AgenciaCorreioController($tableGateway);
                },
            ]
        ];
    }

}
