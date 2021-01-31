<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/remove.class.php';

class ms2colorsColorRemoveProcessor extends abstractModuleRemoveProcessor
{
    /** @var string */
    public $objectType = 'ms2colors';

    /** @var string */
    public $classKey = 'ms2colorsColor';
}

return 'ms2colorsColorRemoveProcessor';
