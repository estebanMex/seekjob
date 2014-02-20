<?php

return array(
	'controllers' => array(
		'invokables' => array(
			'Conection\Controller\Conect' => 'Conection\Controller\ConectController',
			'Conection\Mapper\Conect' => 'Conection\Mapper\ConectMapper'
		),
	),
	'router' => array(
		'routes' => array(
			'conection' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/conect/',
					'defaults' => array(
						'controller' => 'Conection\Controller\Conect',
						'action' => 'index',
					),
				),
			),
		),
	),
	'view_manager' => array(
		'template_path_stack' => array(
			__DIR__ . '/../view',
		),
	//TODO Si j'ai le temp spenser à personnaliser le template
//		'template_map' => array(
//			'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
//		)
	),
	'service_manager' => array(
		'factories' => array(
			'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
		),
	),
);