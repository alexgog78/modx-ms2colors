<?php

class ms2ColorsEventms2extendOnGetProductLayout extends abstractModuleEvent
{
    /** @var modManagerController */
    private $controller;

    /**
     * ms2ColorsEventms2extendOnGetProductLayout constructor.
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

    public function run()
    {
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $this->controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':color');

        $this->service->loadMgrAbstractCssJs($this->controller);
        $this->service->loadMgrDefaultCssJs($this->controller);

        $this->controller->addJavascript($this->service->ms2assetsUrl . 'combo/color.select.js');
    }
}
