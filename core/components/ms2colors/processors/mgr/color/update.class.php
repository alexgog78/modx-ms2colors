<?php

if (!$this->loadClass('update', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2colorsColorUpdateProcessor extends amObjectUpdateProcessor
{
    /** @var string */
    public $classKey = 'ms2colorsColor';

    /** @var string */
    public $objectType = 'ms2colors';
}

return 'ms2colorsColorUpdateProcessor';
