<?php

if (!class_exists('abstractModule')) {
    require_once MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/abstractmodule.class.php';
}

class ms2Colors extends abstractModule
{
    /** @var string */
    protected $tablePrefix = 'ms2colors_';

    /** @var array */
    protected $handlers = [
        'mgr' => [
            'MsProduct',
            'MsCategory',
            'MsSettings',
        ],
    ];

    /**
     * @param array $config
     * @return array
     */
    protected function getConfig($config = [])
    {
        $config = parent::getConfig($config);
        $config['ms2JsUrl'] = $config['assetsUrl'] . 'ms2/js/';
        $config['colorFileSource'] = $this->modx->getOption('ms2colors_file_source', [], 0);
        return $config;
    }
}
