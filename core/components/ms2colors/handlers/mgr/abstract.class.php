<?php

if (!class_exists('amMgrHandler')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/handlers/mgr.class.php';
}

abstract class ms2ColorsMgrHandler extends amMgrHandler
{
    /**
     * @param modManagerController $controller
     * @return bool
     */
    public function loadAssets(modManagerController $controller)
    {
        parent::loadAssets($controller);
        $controller->addCss($this->config['cssUrl'] . 'mgr/default.css');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/' . $this->module->objectType . '.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/color.browser.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.indevelopment.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/utils/notice.undefined.js');
    }
}
