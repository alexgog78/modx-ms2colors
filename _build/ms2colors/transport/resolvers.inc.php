<?php

/**
 * @var modX $modx
 * @var modPackageBuilder $builder
 */

/** Creating DB tables */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'database.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);


/** Default modSystemSetting */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'settings.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);


/** Moving modElemets to modCategory */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'category.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);


/** Default Media folder */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'mediafolder.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);


/** miniShop2 plugins */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'ms2plugins.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);


/** Alter msProductData table */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'ms2productdata.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);


/** Creating ms2extendTabs */
$source = PKG_BUILD_TRANSPORT_RESOLVERS_PATH . 'ms2extendtabs.php';
$vehicle = $builder->createVehicle([
    'source' => $source,
], [
    'vehicle_class' => 'xPDOScriptVehicle',
]);
$builder->putVehicle($vehicle);
$modx->log(modX::LOG_LEVEL_INFO, 'Added resolver: ' . $source);
