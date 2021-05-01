<?php 

namespace AnCategoriaVal;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use AnCategoriaVal\Controller\AnCategoriaValController;

class Module implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__."/../config/module.config.php";
    }

    public function getServiceConfig(){
        return[
            'factories' => [
                Model\AnCategoriaValTable::class => function($container){
                    $tableGateway = $container->get(Model\AnCategoriaValTableGateway::class);
                    return new Model\AnCategoriaValTable($tableGateway);
                },
                
                Model\AnCategoriaValTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\AnCategoriaVal());
                    return new TableGateway('an_categoria_val',$dbAdapter,null,$resultSetPrototype);
                },
            ],
        ];
    
    }

    public function getControllerConfig(){
        return[
            'factories' => [
                AnCategoriaValController::class => function($container){
                    $tableGateway = $container->get(Model\AnCategoriaValTable::class);
                    return new AnCategoriaValController($tableGateway);
                },
            ]
        ];
    }

}