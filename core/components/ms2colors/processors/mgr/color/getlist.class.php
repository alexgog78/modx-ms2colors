<?php

require_once dirname(__DIR__) . '/getlist.class.php';

class ms2colorsColorGetListProcessor extends ms2ColorsGetListProcessor
{
    /** @var string */
    public $classKey = 'ms2colorsColor';

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryBeforeCount($c);
        $c->leftJoin('msCategory', 'Category');

        $resourceId = $this->getProperty('resource_id');
        if (isset($resourceId)) {
            $this->filterByResourceId($c, (int)$resourceId);
        }

        $categoryId = $this->getProperty('category_id');
        if (isset($categoryId)) {
            $this->filterByCategoryId($c, (int)$categoryId);
        }

        return $c;
    }

    /**
     * @param xPDOQuery $c
     * @return xPDOQuery
     */
    public function prepareQueryAfterCount(xPDOQuery $c)
    {
        $c = parent::prepareQueryAfterCount($c);
        $c->select($this->modx->getSelectColumns('msCategory', 'Category', 'category_', ['pagetitle']));
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
    private function filterByCategoryId(xPDOQuery $c, int $categoryId)
    {
        $parent = $this->modx->getObject('modResource', [
            'id' => $categoryId,
        ]);
        if (!$parent) {
            return $c;
        }

        $parentIds = $this->modx->getParentIds($categoryId, 10, [
            'context' => $parent->context_key,
        ]);
        array_unshift($parentIds, $categoryId);

        $c->where([
            'resource_id:IN' => $parentIds,
            'AND:resource_id:!=' => 0,
        ]);
        return $c;
    }
}

return 'ms2colorsColorGetListProcessor';
