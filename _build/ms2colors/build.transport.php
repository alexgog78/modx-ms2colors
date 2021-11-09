<?php

/**
 * @var modX $modx
 * @var buildTransport
 */
require_once dirname(__DIR__) . '/modx.php';
require_once dirname(__DIR__) . '/transport.class.php';
require_once __DIR__ . '/build.config.php';

$build = new buildTransport($modx);
$build->createPackage(PKG_NAME_LOWER, PKG_VERSION, PKG_RELEASE)
    ->registerNamespace()
    ->addAttributes([
        'changelog' => file_get_contents(PKG_CORE_PATH . 'docs/changelog.txt'),
        'license' => file_get_contents(PKG_CORE_PATH . 'docs/license.txt'),
        'readme' => file_get_contents(PKG_CORE_PATH . 'docs/readme.txt'),
        'requires' => [
            'php' => '>=7.0',
            'modx' => '>=2.4',
            'abstractModule' => '>=1.1.0',
            'ms2Extend' => '>=1.2.0',
        ],
    ])
    ->addCoreFiles('components/' . PKG_NAME_LOWER)
    ->addAssetsFiles('components/' . PKG_NAME_LOWER)
    ->addSettings(include PKG_BUILD_TRANSPORT_PATH . 'data/settings.php')
    ->addChunks(include PKG_BUILD_TRANSPORT_PATH . 'data/chunks.php')
    ->addSnippets(include PKG_BUILD_TRANSPORT_PATH . 'data/snippets.php')
    ->addPlugins(include PKG_BUILD_TRANSPORT_PATH . 'data/plugins.php')
    ->addMediaSources(include PKG_BUILD_TRANSPORT_PATH . 'data/mediasources.php')
    ->addCategory(PKG_NAME)
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/database.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/mediafolder.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/category.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/settings.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/ms2productdata.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/ms2plugins.php')
    ->addResolver(PKG_BUILD_TRANSPORT_PATH . 'resolvers/ms2extendtabs.php')
    ->pack();

exit();
