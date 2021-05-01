<?php

namespace AnClassificacao;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'an-classificacao' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/an-classificacao[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\AnClassificacaoController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\AnClassificacaoController::class => InvokableFactory::class,
        ],  
    ],
    'view_manager' => [
        'template_path_stack' => [
            'an-classificacao' => __DIR__ . '/../view',
        ],
    ],
     'db' => [
     'driver' => 'Mysqli',
     'database' => 'test',
     'username' => 'root',
     'password' => '3009',
     'hostname' => 'localhost'
     //Pdo_Mysql
     //'hostname' => 'localhost'
     ],
];