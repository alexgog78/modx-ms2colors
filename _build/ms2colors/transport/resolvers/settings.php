<?php

/**
 * @var xPDOTransport $transport
 * @var array $options
 * @var modX $modx
 */

if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $source = $modx->getObject('sources.modMediaSource', [
                'name' => 'ms2Colors',
            ]);
            $setting = $modx->getObject('modSystemSetting', [
                'key' => 'ms2colors_file_source',
            ]);
            $setting->set('value', $source->id);
            $setting->save();

            //$source->createContainer('zzz', '/');
            @mkdir(MODX_ASSETS_PATH . 'media/');
            @mkdir(MODX_ASSETS_PATH . 'media/ms2colors/');
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
