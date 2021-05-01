<?php

namespace AdPlano;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'ad-plano' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/ad-plano[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\AdPlanoController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\AdPlanoController::class => InvokableFactory::class,
        ],  
    ],
    'view_manager' => [
        'template_path_stack' => [
            'ad-plano' => __DIR__ . '/../view',
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