<?php

/** @var modX $modx */

/** @var ms2Colors $ms2Colors */
$ms2Colors = $modx->getService('ms2colors', 'ms2Colors', MODX_CORE_PATH . 'components/ms2colors/model/ms2colors/', [
    'ctx' => $modx->context->key,
]);
if (!($ms2Colors instanceof ms2Colors)) {
    exit('Could not load ms2Colors');
}

$modxEvent = $modx->event->name;
switch ($modxEvent) {
    case 'ms2extOnGetProductLayout':
        /** @var modManagerController $controller */
        $ms2Colors->mgrMsProduct->loadAssets($controller);
        break;
    case 'ms2extOnGetCategoryLayout':
        /** @var modManagerController $controller */
        $ms2Colors->mgrMsCategory->addLexicon($controller);
        $ms2Colors->mgrMsCategory->loadAssets($controller);
        break;
    case 'ms2extOnGetSettingsLayout':
        /** @var modManagerController $controller */
        $ms2Colors->mgrMsSettings->addLexicon($controller);
        $ms2Colors->mgrMsSettings->loadAssets($controller);
        break;
}
return;
