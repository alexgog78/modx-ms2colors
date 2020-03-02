<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $miniShop2 = $modx->getService('miniShop2');
            $miniShop2->addPlugin('ms2colors_product', '{core_path}components/ms2colors/ms2/plugins/product/index.php');
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
