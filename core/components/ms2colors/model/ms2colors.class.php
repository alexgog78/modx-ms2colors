<?php

$this->loadClass('abstractModule', MODX_CORE_PATH . 'components/abstractmodule/model/', true, true);

class ms2Colors extends abstractModule
{
    const PKG_VERSION = '1.1.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'ms2colors';
    const TABLE_PREFIX = 'ms2colors_';

    /**
     * @param array $config
     */
    protected function setConfig($config = [])
    {
        parent::setConfig($config);
        $this->config['fileSource'] = $this->modx->getOption(self::PKG_NAMESPACE . '_file_source');
        $this->config['ms2assetsUrl'] = $this->assetsUrl . 'ms2/';
    }
}
