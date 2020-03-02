<?php

return [
    [
        'name' => 'ms2Colors',
        'static_file' => 'ms2colors.php',
        'events' => [
            'ms2extOnGetCategoryLayout',
            'ms2extOnGetProductLayout',
            'ms2extOnGetSettingsLayout',
        ],
    ],
];
