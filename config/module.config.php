<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonMain for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(

    'asset_manager' => array(
        'resolver_configs' => array(
            'collections' => array(
                'js/main.js' => array(
                    'commons/js/jquery-1.11.1.js',
                    'commons/js/bootstrap.min.js',
                    'commons/js/bootstrap-hogan-2.0.0.js',
                    'commons/js/bootstrap-typeahead.min.js',
                    'commons/js/jquery.easing.min.js',
                    'js/scrolling-nav.js',
                    'commons/js/classie.js',
                    'js/frontend.js',
                ),
                'js/ckeditor.js' => array(
                    'js/ckeditor.path.js',
                    'commons/ckeditor/ckeditor.js',
                    'commons/ckeditor/adapters/jquery.js',
                    'js/ckeditor.config.js',
                ),
                'css/main.css' => array(
                    'commons/css/bootstrap.min.css',
                    'commons/css/bootstrap-typeahead.css',
                    'commons/css/font-awesome.min.css',
                    'css/site.css',
                ),
            ),
            'paths' => array(
                __DIR__ . '/../public',
                __DIR__ . '/../../../../public'
            ),
        ),
    ),
    'navigation' => array(
        'default' => array(
            'main' => array(
                'label' => _('Home'),
                'route' => 'home',
            ),
            'contact' => array(
                'label' => _('Contact us'),
                'route' => 'contact',
                'order' => '1000',
            ),
        ),
    ),
    'bjyauthorize' => array(
        'guards' => array(
            'BjyAuthorize\Guard\Route' => array(
                // Generic route guards
                array('route' => 'home', 'roles' => array('guest')),
                array('route' => 'main', 'roles' => array('guest')),
                array('route' => 'main/default', 'roles' => array('guest')),
            ),
        ),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Main\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /main/:controller/:action
            'main' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/main',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Main\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
        'factories' => array(
            'navigation' => function ($sm) {
                $navigation = new \Zend\Navigation\Service\DefaultNavigationFactory;
                $navigation = $navigation->createService($sm);
                return $navigation;
            }
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Main\Controller\Index' => 'Main\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_map' => array(
            'header' => __DIR__ . '/../view/partial/header.phtml',
            'footer' => __DIR__ . '/../view/partial/footer.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/frontend.phtml',
            'main/index/index' => __DIR__ . '/../view/main/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(),
        ),
    ),
);
