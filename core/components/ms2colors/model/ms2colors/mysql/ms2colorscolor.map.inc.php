<?php

$xpdo_meta_map['ms2colorsColor'] = [
    'package' => 'ms2colors',
    'version' => '1.1',
    'table' => 'colors',
    'extends' => 'abstractSimpleObject',
    'tableMeta' => [
        'engine' => 'InnoDB',
    ],
    'fields' => [
        'resource_id' => 0,
        'name' => NULL,
        'description' => NULL,
        'image' => NULL,
        'sort_order' => 0,
        'is_active' => 0,
        'properties' => NULL,
    ],
    'fieldMeta' => [
        'resource_id' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'null' => false,
            'default' => 0,
        ],
        'name' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'description' => [
            'dbtype' => 'text',
            'phptype' => 'string',
            'null' => true,
        ],
        'image' => [
            'dbtype' => 'varchar',
            'precision' => '255',
            'phptype' => 'string',
            'null' => true,
        ],
        'sort_order' => [
            'dbtype' => 'int',
            'precision' => '10',
            'attributes' => 'unsigned',
            'phptype' => 'integer',
            'default' => 0,
        ],
        'is_active' => [
            'dbtype' => 'tinyint',
            'precision' => '1',
            'attributes' => 'unsigned',
            'phptype' => 'boolean',
            'null' => false,
            'default' => 0,
        ],
        'properties' => [
            'dbtype' => 'text',
            'phptype' => 'json',
            'null' => true,
        ],
    ],
    'indexes' => [
        'resource_id' => [
            'alias' => 'resource_id',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'resource_id' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
        'sort_order' => [
            'alias' => 'sort_order',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'sort_order' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
        'is_active' => [
            'alias' => 'is_active',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'is_active' => [
                    'length' => '',
                    'collation' => 'A',
                    'null' => false,
                ],
            ],
        ],
    ],
    'aggregates' => [
        'Category' => [
            'class' => 'msCategory',
            'local' => 'resource_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
            'criteria' => [
                'foreign' => [
                    'class_key' => 'msCategory',
                ],
            ],
        ],
        'Product' => [
            'class' => 'msProduct',
            'local' => 'resource_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
            'criteria' => [
                'foreign' => [
                    'class_key' => 'msProduct',
                ],
            ],
        ],
    ],
    'validation' => [
        'rules' => [
            'name' => [
                'preventBlank' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'xPDOMinLengthValidationRule',
                    'value' => '1',
                    'message' => 'field_required',
                ],
            ],
        ],
    ],
];
