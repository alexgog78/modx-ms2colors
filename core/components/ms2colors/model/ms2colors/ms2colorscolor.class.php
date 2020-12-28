<?php

require_once dirname(__DIR__) . '/helpers/menuindex.trait.php';

class ms2colorsColor extends xPDOSimpleObject
{
    use ms2ColorsModelHelperMenuindex;

    /**
     * @param null $cacheFlag
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        $this->setMenuindex();
        return parent::save($cacheFlag);
    }

    /**
     * @return array
     */
    protected function getMenuindexConditions()
    {
        return [
            'resource_id' => $this->get('resource_id'),
        ];
    }
}
