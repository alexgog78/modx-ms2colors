<?php

trait mse2FiltersHelperMs2Colors
{
    /**
     * @param array $values
     * @param string $name
     * @return array
     */
    public function buildMs2ColorsFilter(array $values, $name = '')
    {
        if (count($values) < 2 && empty($this->config['showEmptyFilters'])) {
            return [];
        }

        $query = $this->prepareMs2ColorsQuery($values);
        if (!$query) {
            return $this->sortFilters([], 'colors', ['name' => $name]);
        }

        $colors = [];
        while ($row = $query->stmt->fetch(PDO::FETCH_ASSOC)) {
            $colors[$row['id']] = [
                'name' => $row['name'],
                'image' => $row['image'],
            ];
        }

        $results = [];
        foreach ($values as $colorId => $ids) {
            if ($colorId == 0) {
                continue;
            }
            $title = $colors[$colorId]['name'] ?? $this->modx->lexicon('mse2_filter_boolean_no');
            $results[$title] = [
                'title' => $title,
                'image' => $colors[$colorId]['image'],
                'value' => $colorId,
                'type' => 'color',
                'resources' => $ids,
            ];
        }

        return $this->sortFilters($results, 'colors', ['name' => $name]);
    }

    /**
     * @param array $values
     * @param string $name
     * @return array
     */
    public function buildMs2ColorsImageFilter(array $values, $name = '')
    {
        $results = $this->buildMs2ColorsFilter($values, $name);
        array_walk($results, function (&$item) {
            $item['title'] = [
                'name' => $item['title'],
                'image' => $item['image'],
            ];
        });
        return $results;
    }

    /**
     * @param array $values
     * @return false|xPDOQuery
     */
    private function prepareMs2ColorsQuery($values = [])
    {
        $this->modx->getService('ms2colors', 'ms2Colors', MODX_CORE_PATH . 'components/ms2colors/model/');

        $colorIds = array_keys($values);
        $query = $this->modx->newQuery('ms2colorsColor', [
            'id:IN' => $colorIds,
        ]);
        $query->select('id, name, image');

        $tstart = microtime(true);
        if (!$query->prepare() || !$query->stmt->execute()) {
            return false;
        }
        $this->modx->queryTime += microtime(true) - $tstart;
        $this->modx->executedQueries++;
        return $query;
    }
}
