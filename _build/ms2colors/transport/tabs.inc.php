<?php

/**
 * @var modX $modx
 * @var modPackageBuilder $builder
 */

/** @var ms2Extend $ms2Extend */
$ms2Extend = $modx->getService('ms2extend', 'ms2Extend', MODX_CORE_PATH . 'components/ms2extend/model/');

$tabs = include PKG_BUILD_TRANSPORT_DATA_PATH . 'tabs.php';
foreach ($tabs as $classKey => $data) {
    $tab = $modx->newObject($classKey);
    $tab->fromArray($data, '', true, true);

    $vehicle = $builder->createVehicle($tab, [
        xPDOTransport::PRESERVE_KEYS => true,
        xPDOTransport::UPDATE_OBJECT => true,
        xPDOTransport::UNIQUE_KEY => 'name',
    ]);
    $builder->putVehicle($vehicle);
    $modx->log(modX::LOG_LEVEL_INFO, 'Added package ' . $classKey . ': ' . $data['name']);
}
