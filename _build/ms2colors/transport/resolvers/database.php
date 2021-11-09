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
            /**
             * @var ms2Colors $service
             * @var xPDOManager $manager
             */
            $service = $modx->getService('ms2colors', 'ms2Colors', MODX_CORE_PATH . 'components/ms2colors/model/');
            $manager = $modx->getManager();
            $mapFile = $service->modelPath . $service::PKG_NAMESPACE . '/metadata.mysql.php';

            /**
             * @var $xpdo_meta_map
             * @noinspection PhpIncludeInspection
             */
            include $mapFile;
            foreach ($xpdo_meta_map as $baseClass => $extends) {
                foreach ($extends as $className) {
                    $manager->createObjectContainer($className);
                }
            }
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
