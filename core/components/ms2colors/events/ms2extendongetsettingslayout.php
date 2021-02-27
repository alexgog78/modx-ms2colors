<?php

class ms2ColorsEventms2extendOnGetSettingsLayout extends abstractModuleEvent
{
    /** @var modManagerController */
    private $controller;

    /**
     * ms2ColorsEventms2extendOnGetSettingsLayout constructor.
     *
     * @param ms2Colors $service
     * @param string $eventName
     * @param array $scriptProperties
     */
    public function __construct(ms2Colors $service, string $eventName, $scriptProperties = [])
    {
        parent::__construct($service, $eventName, $scriptProperties);
        $this->controller = $scriptProperties['controller'];
    }

    protected function handleEvent()
    {
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':color');

        $this->service->loadMgrAbstractCssJs($this->controller);
        $this->service->loadMgrDefaultCssJs($this->controller);

        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/grid.color.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/window.color.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/property/grid.color.property.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/property/window.color.property.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $this->controller->addJavascript($this->service->jsUrl . 'mgr/ms2/grid.settings.color.js');
    }
}
