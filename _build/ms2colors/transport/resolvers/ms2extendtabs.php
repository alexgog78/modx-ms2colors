<?php

/**
 * @var xPDOTransport $transport
 * @var array $options
 * @var modX $modx
 */

if ($transport->xpdo) {
    $modx = &$transport->xpdo;

    /** @var ms2Extend $ms2Extend */
    $ms2Extend = $modx->getService('ms2extend', 'ms2Extend', MODX_CORE_PATH . 'components/ms2extend/model/');

    $tabs = [
        'ms2extendProductTab' => [
            'name' => 'ms2Colors',
            'fields' => [
                'ms2colors_common_id',
                'ms2colors_collection_id',
            ],
        ],
        'ms2extendCategoryTab' => [
            'name' => 'ms2Colors',
            'description' => 'Данные цвета будут доступны для дочерних товаров.',
            'xtypes' => [
                'ms2colors-grid-category-color',
            ],
        ],
        'ms2extendSettingsTab' => [
            'name' => 'ms2Colors',
            'description' => 'Основные цвета товара, которые будут доступны в фильтре для поиска товара.',
            'xtypes' => [
                'ms2colors-grid-settings-color',
            ],
        ],
    ];

    foreach ($tabs as $classKey => $data) {
        $tab = $modx->getObject($classKey, ['name' => $data['name']]);

        switch ($options[xPDOTransport::PACKAGE_ACTION]) {
            case xPDOTransport::ACTION_INSTALL:
            case xPDOTransport::ACTION_UPGRADE:
                if (!$tab) {
                    $tab = $modx->newObject($classKey);
                }
                $tab->fromArray(array_merge([
                    'is_active' => 1,
                ], $data), '', true, true);
                $tab->save();
                break;
            case xPDOTransport::ACTION_UNINSTALL:
                $tab->remove();
                break;
        }
    }
}
return true;
