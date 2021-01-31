<?php

$this->loadClass('abstractSimpleObject', MODX_CORE_PATH . 'components/abstractmodule/model/abstractmodule/', true, true);

class ms2colorsColor extends abstractSimpleObject
{
    /** @var bool */
    protected $timestamps = false;

    /**
     * @return array
     */
    protected function getSortOrderConditions()
    {
        return [
            'resource_id' => $this->get('resource_id'),
        ];
    }
}
