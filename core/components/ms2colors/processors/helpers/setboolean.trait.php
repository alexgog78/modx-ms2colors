<?php

trait ms2ColorsProcessorHelperSetBoolean
{
    private function setBoolean()
    {
        foreach ($this->object->_fieldMeta as $fieldKey => $meta) {
            if ($meta['phptype'] != 'boolean') {
                continue;
            }
            $this->setCheckbox($fieldKey);
        }
    }
}
