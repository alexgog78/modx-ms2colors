<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/update.class.php';

class ms2colorsColorUpdateProcessor extends abstractModuleUpdateProcessor
{
    /** @var string */
    public $objectType = 'ms2colors';

    /** @var string */
    public $classKey = 'ms2colorsColor';
}

return 'ms2colorsColorUpdateProcessor';
