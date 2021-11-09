<?php

class ms2ColorsEventms2extendOnGetSettingsTabs extends abstractModuleMgrEvent
{
    /** @var modManagerController */
    private $controller;

    protected function run()
    {
        $this->controller = $this->scriptProperties['controller'];

        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':color');

        $this->service->loadMgrAssets($this->controller);

        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/grid.color.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/window.color.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/property/grid.color.property.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/property/window.color.property.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/ms2/grid.settings.color.js');
    }
}
