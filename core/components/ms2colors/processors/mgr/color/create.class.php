<?php

/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'components/abstractmodule/processors/create.class.php';

class ms2colorsColorCreateProcessor extends abstractModuleCreateProcessor
{
    /** @var string */
    public $objectType = 'ms2colors';

    /** @var string */
    public $classKey = 'ms2colorsColor';
}

return 'ms2colorsColorCreateProcessor';
