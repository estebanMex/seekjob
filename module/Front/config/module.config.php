<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Front\Controller\Front' => 'Front\Controller\FrontController',
        ),
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/front',
      
                    'defaults' => array(
                        'controller' => 'Front\Controller\Front',
                        'action'     => 'index',

                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'album' => __DIR__ . '/../view',
        ),
    ),
);