<?php

require_once dirname(__DIR__) . '/helpers/log.trait.php';
require_once dirname(__DIR__) . '/helpers/event.trait.php';

class ms2Colors
{
    use ms2ColorsHelperLog;
    use ms2ColorsHelperEvent;

    const PKG_VERSION = '1.1.0';
    const PKG_RELEASE = 'beta';
    const PKG_NAMESPACE = 'ms2colors';
    const TABLE_PREFIX = 'ms2colors_';
    const DEVELOPER_MODE = true;

    /** @var modX */
    public $modx;

    /** @var array */
    public $config = [];

    /** @var ms2ColorsMgr */
    public $mgrHandler;

    /**
     * ms2Colors constructor.
     *
     * @param modX $modx
     * @param array $config
     */
    public function __construct(modX $modx, array $config = [])
    {
        $this->modx = $modx;
        $this->config = $this->getConfig($config);
        $this->modx->addPackage(self::PKG_NAMESPACE, $this->modelPath, self::TABLE_PREFIX);
        $this->modx->lexicon->load(self::PKG_NAMESPACE . ':default');

        require_once __DIR__ . '/ms2colorsmgr.class.php';
        $this->mgrHandler = new ms2ColorsMgr($this);
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }
        return null;
    }

    /**
     * @param array $config
     * @return array
     */
    protected function getConfig($config = [])
    {
        $corePath = $this->modx->getOption(self::PKG_NAMESPACE . '.core_path', $config, MODX_CORE_PATH . 'components/' . self::PKG_NAMESPACE . '/');
        $assetsPath = $this->modx->getOption(self::PKG_NAMESPACE . '.assets_path', $config, MODX_ASSETS_PATH . 'components/' . self::PKG_NAMESPACE . '/');
        $assetsUrl = $this->modx->getOption(self::PKG_NAMESPACE . '.assets_url', $config, MODX_ASSETS_URL . 'components/' . self::PKG_NAMESPACE . '/');
        return array_merge([
            'corePath' => $corePath,
            'assetsPath' => $assetsPath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'ms2assetsUrl' => $assetsUrl . 'ms2/',
            'fileSource' => $this->modx->getOption(self::PKG_NAMESPACE . '_file_source'),
        ], $config);
    }
}
