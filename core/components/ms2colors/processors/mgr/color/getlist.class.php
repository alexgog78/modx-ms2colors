<?php

if (!$this->loadClass('abstractObjectGetListProcessor', MODX_CORE_PATH . 'components/abstractmodule/processors/mgr/object/', true, true)) {
    return false;
}

class ms2colorsColorGetListProcessor extends abstractObjectGetListProcessor
{
    /** @var string */
    public $classKey = 'ms2colorsColor';

    /** @var string */
    public $objectType = 'ms2colors';

    /** @var string */
    public $defaultSortField = 'menuindex';

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryBeforeCount($c);

        $c->leftJoin('modResource', 'Resource');

        $resourceId = $this->getProperty('resource_id');
        if (isset($resourceId)) {
            $this->filterByResourceId($c, (int) $resourceId);
        }

        $parentId = $this->getProperty('parent_id');
        if (isset($parentId)) {
            $this->filterByParentId($c, (int) $parentId);
        }

        return $c;
    }

    public function prepareQueryAfterCount(xPDOQuery $c) {
        $c = parent::prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns('modResource', 'Resource', 'resource_', ['pagetitle']));
        return $c;
    }

    /**
     * @param xPDOQuery $c
     * @param string $query
     * @return xPDOQuery
     */
    protected function searchQuery(xPDOQuery $c, $query)
    {
        $c->where([
            'name:LIKE' => '%' . $query . '%',
        ]);
        return $c;
    }

    /**
     * @param xPDOQuery $c
     * @param int $resourceId
     * @return xPDOQuery
     */
    private function filterByResourceId(xPDOQuery $c, int $resourceId)
    {
        $c->where([
            'resource_id' => $resourceId,
        ]);
        return $c;
    }

    /**
     * @param xPDOQuery $c
     * @param int $parentId
     * @return xPDOQuery
     */
    private function filterByParentId(xPDOQuery $c, int $parentId)
    {
        $parent = $this->modx->getObject('modResource', [
            'id' => $parentId
        ]);
        if (!$parent) {
            return $c;
        }

        $parentIds = $this->modx->getParentIds($parentId, 10, [
            'context' => $parent->context_key
        ]);
        array_unshift($parentIds, $parentId);

        $c->where([
            'resource_id:IN' => $parentIds,
            'AND:resource_id:!=' => 0,
        ]);
        return $c;
    }
}

return 'ms2colorsColorGetListProcessor';
