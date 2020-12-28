<?php

class ms2ColorsMgr
{
    /** @var ms2Colors */
    private $service;

    /** @var modX */
    private $modx;

    /**
     * ms2ColorsMgr constructor.
     *
     * @param ms2Colors $service
     */
    public function __construct(ms2Colors $service)
    {
        $this->service = $service;
        $this->modx = $service->modx;
    }

    public function renderProduct(modManagerController $controller)
    {
        $this->loadLexicon($controller);
        $this->addDefaultAssets($controller);
        $controller->addJavascript($this->service->ms2assetsUrl . 'combo/color.select.js');
    }

    public function renderCategory(modManagerController $controller)
    {
        $this->loadLexicon($controller);
        $this->addDefaultAssets($controller);
        $controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/grid.color.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/window.color.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/ms2/grid.category.color.js');
    }

    public function renderSettings(modManagerController $controller)
    {
        $this->loadLexicon($controller);
        $this->addDefaultAssets($controller);
        $controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/grid.color.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/widgets/color/window.color.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/combo/browser.image.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/ms2/grid.settings.color.js');
    }

    /**
     * @param modManagerController $controller
     */
    private function loadLexicon(modManagerController $controller)
    {
        $controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':default');
        $controller->addLexiconTopic($this->service::PKG_NAMESPACE . ':color');
    }

    /**
     * @param modManagerController $controller
     */
    private function addDefaultAssets(modManagerController $controller)
    {
        $controller->addJavascript($this->service->jsUrl . 'mgr/' . $this->service::PKG_NAMESPACE . '.js');

        $controller->addCss($this->service->cssUrl . 'mgr/core/styles.css');

        $controller->addJavascript($this->service->jsUrl . 'mgr/core/widgets/panel.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/widgets/formpanel.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/widgets/grid.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/widgets/localgrid.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/widgets/window.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/widgets/page.js');

        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.local.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.local.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/select.remote.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/multiselect.remote.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/combo/browser.js');

        $controller->addJavascript($this->service->jsUrl . 'mgr/core/misc/function.list.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/misc/component.list.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/core/misc/renderer.list.js');

        $controller->addCss($this->service->cssUrl . 'mgr/default.css');
        $controller->addJavascript($this->service->jsUrl . 'mgr/misc/function.list.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/misc/component.list.js');
        $controller->addJavascript($this->service->jsUrl . 'mgr/misc/renderer.list.js');
        $configJs = $this->modx->toJSON($this->service->config);
        $controller->addHtml('<script type="text/javascript">' . get_class($this->service) . '.config = ' . $configJs . ';</script>');
    }
}
