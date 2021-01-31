<?php

return [
    [
        'name' => 'ms2Colors',
        'static_file' => 'ms2colors.php',
        'events' => [
            'ms2extendOnGetCategoryLayout',
            'ms2extendOnGetProductLayout',
            'ms2extendOnGetSettingsLayout',
        ],
    ],
];
