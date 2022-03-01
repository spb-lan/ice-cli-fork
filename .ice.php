<?php

return [
    'vendor' => 'spb-lan',
    'name' => 'ice-cli-fork',
    'namespace' => 'Ifacesoft\Ice\Cli\\',
    'alias' => 'Icli',
    'description' => 'Ice App Application',
    'url' => 'http://ice-cli.ifacesoft.iceframework.net',
    'type' => 'module',
    'context' => '',
//    'source' => [
//        'vcs' => 'mercurial',
//        'repo' => 'https://bitbucket.org/ifacesoft/ice-cli'
//    ],
//    'authors' => [
//        [
//            'name' => 'dp',
//            'email' => 'denis.a.shestakov@gmail.com'
//        ]
//    ],
    'pathes' => [
        'config' => 'config/',
        'source' => 'source/backend/',
        'resource' => 'source/resource/',
    ],
    'environments' => [
        'prod' => [
            'pattern' => '/^ice-cli-fork\.prod\.local$/',
        ],
        'test' => [
            'pattern' => '/^ice-cli-fork\.test\.local$/',
        ],
        'dev' => [
            'pattern' => '/^ice-cli-fork\.dev\.local$/',
        ],
    ],
    'modules' => [
        'spb-lan/ice-core' => [],
    ]
];