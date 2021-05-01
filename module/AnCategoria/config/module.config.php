<?php

namespace AnCategoria;

use Zend\ServiceManager\Factory\InvokableFactory;


return [
    'router' => [
        'routes' => [
            'an-categoria' => [
                'type' => \Zend\Router\Http\Segment::class,
                'options' => [
                    'route' => '/an-categoria[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller' => Controller\AnCategoriaController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            //Controller\AnCategoriaController::class => InvokableFactory::class,
        ],  
    ],
    'view_manager' => [
        'template_path_stack' => [
            'an-categoria' => __DIR__ . '/../view',
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