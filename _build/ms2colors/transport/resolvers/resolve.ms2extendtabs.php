<?php

/**
 * @var xPDOTransport $transport
 * @var array $options
 * @var modX $modx
 */

if ($transport->xpdo) {
    $modx = &$transport->xpdo;

    $tabs = [
        'ms2extendProductTab' => [
            'name' => 'ms2Colors',
            'fields' => [
                'ms2colors_common_id',
                'ms2colors_collection_id',
            ],
            'is_active' => 1,
        ],
        'ms2extendCategoryTab' => [
            'name' => 'ms2Colors',
            'description' => 'Данные цвета будут доступны для дочерних товаров.',
            'xtypes' => [
                'ms2colors-grid-category-color',
            ],
            'is_active' => 1,
        ],
        'ms2extendSettingsTab' => [
            'name' => 'ms2Colors',
            'description' => 'Основные цвета товара, которые будут доступны в фильтре для поиска товара.',
            'xtypes' => [
                'ms2colors-grid-settings-color',
            ],
            'is_active' => 1,
        ],
    ];

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            /** @var ms2Extend $service */
            $ms2Extend = $modx->getService('ms2extend', 'ms2Extend', $modx->getOption('core_path') . 'components/ms2extend/model/ms2extend/', []);
            foreach ($tabs as $tabClass => $tabData) {
                if ($tab = $modx->getObject($tabClass, ['name' => $tabData['name']])) {
                    continue;
                }
                $tab = $modx->newObject($tabClass);
                $tab->fromArray($tabData);
                $tab->save();
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
