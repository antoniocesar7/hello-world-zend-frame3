<?php

namespace AdPlano;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use AdPlano\Controller\AdPlanoController;

class AdPlanoConfig implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__."/../config/module.config.php";
    }

    
    
    public function getServiceConfig(){
        return[
            'factories' => [
                Model\AdPlanoTable::class => function($container){
                    $tableGateway = $container->get(Model\AdPlanoTableGateway::class);
                    return new Model\AdPlanoTable($tableGateway);
                },
                
                Model\AdPlanoTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\AdPlano());
                    return new TableGateway('ad_plano',$dbAdapter,null,$resultSetPrototype);
                },
            ],
        ];
    
    }

    public function getControllerConfig(){
        return[
            'factories' => [
                AdPlanoController::class => function($container){
                    $tableGateway = $container->get(Model\AdPlanoTable::class);
                    return new AdPlanoController($tableGateway);
                },
            ]
        ];
    }
}