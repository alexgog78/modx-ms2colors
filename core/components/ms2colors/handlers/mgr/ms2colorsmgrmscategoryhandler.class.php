<?php

class ms2ColorsMgrMsCategoryHandler extends abstractMgrHandler
{
    /**
     * @param modManagerController $controller
     */
    public function loadAssets(modManagerController $controller)
    {
        parent::loadAssets($controller);
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/widgets/color/grid.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/widgets/color/window.js');
        $controller->addJavascript($this->config['jsUrl'] . 'mgr/combo/color.browser.js');
        $controller->addJavascript($this->config['ms2JsUrl'] . 'mgr/extend/category/grid.js');
    }
}
