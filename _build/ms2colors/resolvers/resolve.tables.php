<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx = &$transport->xpdo;

    $models = [
        'ms2colorsColor',
        'ms2extendCategoryTab',
        'ms2extendSettingsTab',
    ];

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $ms2Extend = $modx->getService('ms2colors', 'ms2Colors', $modx->getOption('core_path') . 'components/ms2colors/model/ms2colors/', []);
            $manager = $modx->getManager();
            foreach ($models as $model) {
                $manager->createObjectContainer($model);
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
