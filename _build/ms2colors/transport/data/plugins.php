<?php

return [
    [
        'name' => 'ms2Colors',
        'static_file' => PKG_ELEMENTS_PATH . 'plugins/ms2colors.php',
        'events' => [
            'ms2extendOnGetCategoryTabs',
            'ms2extendOnGetProductTabs',
            'ms2extendOnGetSettingsTabs',
        ],
    ],
];
