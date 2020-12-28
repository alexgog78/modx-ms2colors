<?php

return [
    'fields' => [
        'ms2colors_common_id' => 0,
        'ms2colors_collection_id' => 0,
    ],
    'fieldMeta' => [
        'ms2colors_common_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'default' => 0,
        ],
        'ms2colors_collection_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'default' => 0,
        ],
    ],
    'indexes' => [
        'ms2colors_common_id' => [
            'alias' => 'ms2colors_common_id',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'ms2colors_common_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
        'ms2colors_collection_id' => [
            'alias' => 'ms2colors_collection_id',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'ms2colors_collection_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
    ],
    'aggregates' => [
        'ms2colorCommon' => [
            'class' => 'ms2colorsColor',
            'local' => 'ms2colors_common_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
        ],
        'ms2colorCollection' => [
            'class' => 'ms2colorsColor',
            'local' => 'ms2colors_collection_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
        ],
    ],
];
