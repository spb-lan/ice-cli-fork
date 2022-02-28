<?php

return [
    'vendor' => 'ifacesoft',
    'name' => 'ice-cli',
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
            'pattern' => '/^ice-cli\.prod\.local$/',
        ],
        'test' => [
            'pattern' => '/^ice-cli\.test\.local$/',
        ],
        'dev' => [
            'pattern' => '/^ice-cli\.dev\.local$/',
        ],
    ],
    'modules' => [
        'ifacesoft/ice-core' => [],
    ]
];