<?php

if (!class_exists('ms2ColorsMgrHandler')) {
    require_once dirname(__FILE__) . '/abstract.class.php';
}

class ms2ColorsMgrMsProductHandler extends ms2ColorsMgrHandler
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
