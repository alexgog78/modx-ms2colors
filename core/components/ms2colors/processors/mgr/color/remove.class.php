<?php

if (!$this->loadClass('AbstractObjectRemoveProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2colorsColorRemoveProcessor extends AbstractObjectRemoveProcessor
{
    /** @var string */
    public $classKey = 'ms2colorsColor';

    /** @var string */
    public $objectType = 'ms2colors';
}

return 'ms2colorsColorRemoveProcessor';
