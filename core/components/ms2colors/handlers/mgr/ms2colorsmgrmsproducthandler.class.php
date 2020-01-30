<?php

class ms2ColorsMgrMsProductHandler extends abstractMgrHandler
{
    /**
     * @param modManagerController $controller
     */
    public function loadAssets(modManagerController $controller)
    {
        parent::loadAssets($controller);
        $controller->addJavascript($this->config['ms2JsUrl'] . 'mgr/combo/color.select.js');
    }
}
