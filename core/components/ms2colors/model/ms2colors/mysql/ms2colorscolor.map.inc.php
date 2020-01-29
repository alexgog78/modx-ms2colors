<?php

$xpdo_meta_map['ms2colorsColor'] = [
    'package' => 'ms2colors',
    'version' => '1.0',
    'table' => 'colors',
    'extends' => 'xPDOSimpleObject',
    'tableMeta' => [
        'engine' => 'MyISAM',
    ],
    'fields' => [
        'resource_id' => 0,
        'name' => NULL,
        'description' => NULL,
        'image' => NULL,
        'menuindex' => 0,
        'is_active' => 0,
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
        'menuindex' => [
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
        'menuindex' => [
            'alias' => 'menuindex',
            'primary' => false,
            'unique' => false,
            'type' => 'BTREE',
            'columns' => [
                'menuindex' => [
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
        'Resource' => [
            'class' => 'modResource',
            'local' => 'resource_id',
            'foreign' => 'id',
            'cardinality' => 'one',
            'owner' => 'local',
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
                'unique' => [
                    'type' => 'xPDOValidationRule',
                    'rule' => 'validation.ms2ColorsValidatorUnique',
                    'excludeFields' => 'resource_id',
                    'message' => 'ms2colors.err_ae',
                ],
            ],
        ],
    ],
];
