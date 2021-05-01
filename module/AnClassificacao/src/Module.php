<?php

namespace AnClassificacao;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\TableGateway\TableGateway;
use AnClassificacao\Controller\AnClassificacaoController;
use Zend\Db\ResultSet\ResultSet;

class Module implements ConfigProviderInterface{
    public function getConfig(){
        return include __DIR__."/../config/module.config.php";
    }

    public function getServiceConfig(){
        return[
            'factories' => [
                Model\AnClassificacaoTable::class => function($container){
                    $tableGateway = $container->get(Model\AnClassificacaoTableGateway::class);
                    return new Model\AnClassificacaoTable($tableGateway);
                },

                Model\AnClassificacaoTableGateway::class => function($container){
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();

                    $resultSetPrototype->setArrayObjectPrototype(new Model\AnClassificacao());
                    return new TableGateway('an_classificacao',$dbAdapter,null,$resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig(){
        return[
            'factories' => [
                AnClassificacaoController::class => function($container){
                    $tableGateway = $container->get(Model\AnClassificacaoTable::class);
                    return new AnClassificacaoController($tableGateway);
                },
            ]
        ];
    }
}