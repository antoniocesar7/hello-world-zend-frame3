<?php

namespace AgenciaCorreio;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'agencia-correio' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/agencia-correio[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\AgenciaCorreioController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\AgenciaCorreioController::class => InvokableFactory::class,
        ],  
    ],
    'view_manager' => [
        'template_path_stack' => [
            'agencia-correio' => __DIR__ . '/../view',
        ],
    ],
     'db' => [
     'driver' => 'Mysqli',
     'database' => 'test',
     'username' => 'root',
     'password' => '3009',
     'hostname' => '127.0.0.1'
     //Pdo_Mysql
     //'hostname' => 'localhost'
     ],
];