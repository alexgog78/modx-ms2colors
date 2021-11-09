<?php

class ms2ColorsEventms2extendOnGetProductTabs extends abstractModuleMgrEvent
{
    /** @var modManagerController */
    private $controller;

    protected function run()
    {
        $this->controller = $this->scriptProperties['controller'];

        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':color');

        $this->service->loadMgrAssets($this->controller);

        $this->controller->addJavascript($this->service->ms2assetsUrl . 'combo/color.select.js');
    }
}
