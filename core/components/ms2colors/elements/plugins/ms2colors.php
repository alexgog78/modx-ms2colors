<?php

/**
 * @var modX $modx
 * @var array $scriptProperties
 */

/** @var ms2Colors $ms2Colors */
$ms2Colors = $modx->getService('ms2colors', 'ms2Colors', MODX_CORE_PATH . 'components/ms2colors/model/');
if (!($ms2Colors instanceof ms2Colors)) {
    exit('Could not load ms2Colors');
}
$modxEvent = $modx->event->name;
$ms2Colors->handleEvent($modxEvent, $scriptProperties);
return;
