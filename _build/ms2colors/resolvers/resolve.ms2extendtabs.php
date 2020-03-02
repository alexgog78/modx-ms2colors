<?php

/** @var xPDOTransport $transport */

/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx = &$transport->xpdo;

    $tabs = [
        'ms2extendProductTab' => [
            'name' => 'Цвета',
            'fields' => [
                'ms2colors_common_id',
                'ms2colors_collection_id',
            ],
            'is_active' => 1,
        ],
        'ms2extendCategoryTab' => [
            'name' => 'Цвета коллекции',
            'description' => 'Данные цвета будут доступны для дочерних товаров.',
            'xtypes' => [
                'ms2colors-grid-color-category',
            ],
            'is_active' => 1,
        ],
        'ms2extendSettingsTab' => [
            'name' => 'Цвета',
            'description' => 'Основные цвета товара, которые будут доступны в фильтре для поиска товара.',
            'xtypes' => [
                'ms2colors-grid-color-settings',
            ],
            'is_active' => 1,
        ],
    ];

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
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
