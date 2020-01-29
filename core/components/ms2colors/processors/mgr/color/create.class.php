<?php

if (!$this->loadClass('create', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2colorsColorCreateProcessor extends amObjectCreateProcessor
{
    /** @var string */
    public $classKey = 'ms2colorsColor';

    /** @var string */
    public $objectType = 'ms2colors';

    /**
     * @return bool
     */
    public function beforeSave()
    {
        $this->object->fromArray([
            'menuindex' => $this->modx->getCount($this->classKey),
        ]);
        return parent::beforeSave();
    }
}

return 'ms2colorsColorCreateProcessor';
