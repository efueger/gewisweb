<?php
return array(
    'router' => array(
        'routes' => array(
            'decision' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/decision',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Decision\Controller',
                        'controller' => 'Decision',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                    'meeting' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/:type/:number',
                            'constraints' => array(
                                'type' => 'BV|AV|VV|Virt',
                                'number' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            )
                        )
                    )
                ),
                'priority' => 100
            ),
            'admin_decision' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin/decision',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Decision\Controller',
                        'controller' => 'Admin',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                ),
                'priority' => 100
            ),
            'organ' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/organ',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Decision\Controller',
                        'controller'    => 'Organ',
                        'action'        => 'index'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'show' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/show/:organ',
                            'constraints' => array(
                                'organ' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'action' => 'show'
                            )
                        ),
                    ),
                ),
                'priority' => 100
            ),
            'member' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/member',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Decision\Controller',
                        'controller' => 'Member',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'search' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/search',
                            'defaults' => array(
                                'action' => 'search',
                            ),
                        ),
                    ),
                    'birthdays' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/birthdays',
                            'defaults' => array(
                                'action' => 'birthdays'
                            )
                        )
                    ),
                    'dreamspark' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/dreamspark',
                            'defaults' => array(
                                'action' => 'dreamspark'
                            )
                        )
                    ),
                    'view' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/:lidnr',
                            'constraints' => array(
                                'lidnr' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            )
                        )
                    )
                ),
                'priority' => 100
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Decision\Controller\Decision' => 'Decision\Controller\DecisionController',
            'Decision\Controller\Organ' => 'Decision\Controller\OrganController',
            'Decision\Controller\Admin' => 'Decision\Controller\AdminController',
            'Decision\Controller\Member' => 'Decision\Controller\MemberController'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'decision' => __DIR__ . '/../view/'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'decision_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Decision/Model/')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Decision\Model' => 'decision_entities'
                )
            )
        )
    )
);
