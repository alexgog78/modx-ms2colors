<?php

class ms2ColorsEventms2extendOnGetSettingsLayout extends abstractModuleEvent
{
    /** @var modManagerController */
    private $controller;

    /**
     * ms2ColorsEventms2extendOnGetSettingsLayout constructor.
     *
     * @param ms2Colors $service
     * @param array $scriptProperties
     */
    public function __construct(ms2Colors $service, $scriptProperties = [])
    {
        parent::__construct($service, $scriptProperties);
        $this->controller = $scriptProperties['controller'];
    }

    public function run()
    {
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':color');

        $this->service->loadMgrAbstractCssJs($this->controller);
        $this->service->loadMgrDefaultCssJs($this->controller);

        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/grid.color.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/window.color.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/ms2/grid.settings.color.js');
    }
}
