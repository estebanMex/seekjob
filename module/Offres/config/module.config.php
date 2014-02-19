<?php

return array(
	'controllers' => array(
		'invokables' => array(
			'Offres\Controller\Offres' => 'Offres\Controller\OffresController'
		),
	),
	'router' => array(
		'routes' => array(
			'home' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/',
					'defaults' => array(
						'controller' => 'Offres\Controller\Offres',
						'action' => 'index',
					),
				),
			),
			'offres_ajouter' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/offres/ajouter',
					'defaults' => array(
						'controller' => 'Offres\Controller\Offres',
						'action' => 'ajouter',
					),
				),
			),
			'offre_details' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/offres/detail/:id',
					'defaults' => array(
						'controller' => 'Offres\Controller\Offres',
						'action' => 'detail',
					),
					'constraints' => array(
						'id' => '[1-9][0-9]*',
					),
				),
			),
			'offre_modifier' => array(
				'type' => 'Zend\Mvc\Router\Http\Segment',
				'options' => array(
					'route' => '/offres/modifier/:id',
					'defaults' => array(
						'controller' => 'Offres\Controller\Offres',
						'action' => 'modifier',
					),
					'constraints' => array(
						'id' => '[1-9][0-9]*',
					),
				),
			),
			//USER ROUTES
			'offres_inscription' => array(
				'type' => 'Zend\Mvc\Router\Http\Literal',
				'options' => array(
					'route' => '/offres/inscription',
					'defaults' => array(
						'controller' => 'Offres\Controller\Offres',
						'action' => 'inscription',
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
