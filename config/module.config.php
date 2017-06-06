<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace MIAEmail;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return array(
    'router' => [
        'routes' => [
            'email-preview' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/email-preview',
                    'defaults' => [
                        'controller' => Controller\PreviewController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'email-preview-file' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/email-preview-file',
                    'defaults' => [
                        'controller' => Controller\PreviewController::class,
                        'action'     => 'file',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\PreviewController::class => InvokableFactory::class
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\Sendgrid::class => Factory\SendgridFactory::class
        ],
    ],
    'authentication_acl' => [
        'resources' => [
            Controller\PreviewController::class => [
                'actions' => [
                    'index' => ['allow' => 'guest'],
                    'file' => ['allow' => 'guest'],
                ]
            ]
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'preview/index' => __DIR__ . '/../view/preview/index.phtml',
            'preview/file' => __DIR__ . '/../view/preview/file.phtml',
        ],
    ]
);
