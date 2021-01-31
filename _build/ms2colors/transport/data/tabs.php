<?php

return [
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
