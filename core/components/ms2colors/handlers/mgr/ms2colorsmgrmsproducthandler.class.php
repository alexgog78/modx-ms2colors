<?php

class ms2ColorsMgrMsProductHandler extends AbstractMgrHandler
{
    /**
     * @param modManagerController $controller
     */
    public function loadAssets(modManagerController $controller)
    {
        parent::loadAssets($controller);
        $controller->addJavascript($this->config['ms2AssetsUrl'] . 'combo/color.select.js');
    }
}
