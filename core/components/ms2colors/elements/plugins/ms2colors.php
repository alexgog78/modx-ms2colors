<?php

/** @var modX $modx */

/** @var ms2Colors $ms2Colors */
$ms2Colors = $modx->getService('ms2colors', 'ms2Colors', MODX_CORE_PATH . 'components/ms2colors/model/');
if (!($ms2Colors instanceof ms2Colors)) {
    exit('Could not load ms2Colors');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'ms2extendOnGetProductLayout':
        /** @var modManagerController $controller */
        $ms2Colors->mgrHandler->renderProduct($controller);
        break;
    case 'ms2extendOnGetCategoryLayout':
        /** @var modManagerController $controller */
        $ms2Colors->mgrHandler->renderCategory($controller);
        break;
    case 'ms2extendOnGetSettingsLayout':
        /** @var modManagerController $controller */
        $ms2Colors->mgrHandler->renderSettings($controller);
        break;
}
return;
