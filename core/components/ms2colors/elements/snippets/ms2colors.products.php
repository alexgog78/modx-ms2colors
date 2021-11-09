<?php

/**
 * @var modX $modx
 * @var array $scriptProperties
 * @var string $snippet
 */

/** @var ms2Colors $ms2Colors */
$ms2Colors = $modx->getService('ms2colors', 'ms2Colors', MODX_CORE_PATH . 'components/ms2colors/model/');
if (!($ms2Colors instanceof ms2Colors)) {
    exit('Could not load ms2Colors');
}


$scriptProperties['leftJoin']['ms2colorCommon'] = [
    'class' => 'ms2colorsColor',
    'on' => 'Data.ms2colors_common_id = ms2colorCommon.id',
];

$scriptProperties['leftJoin']['ms2colorCollection'] = [
    'class' => 'ms2colorsColor',
    'on' => 'Data.ms2colors_collection_id = ms2colorCollection.id',
];


$scriptProperties['select']['ms2colorCommon'] = $modx->getSelectColumns('ms2colorsColor', 'ms2colorCommon', 'ms2colors_common.', [
    'resource_id',
    'sort_order',
    'is_active',
], true);

$scriptProperties['select']['ms2colorCollection'] = $modx->getSelectColumns('ms2colorsColor', 'ms2colorCollection', 'ms2colors_collection.', [
    'resource_id',
    'sort_order',
    'is_active',
], true);


unset($scriptProperties['snippet']);
return $modx->runSnippet($snippet, $scriptProperties);
