<?php

/**
 * @var xPDOTransport $transport
 * @var array $options
 * @var modX $modx
 */

if ($transport->xpdo) {
    $modx = &$transport->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $category = $modx->getObject('modCategory', ['category' => 'ms2Colors']);

            $chunks = $modx->getCollection('modChunk', [
                'name:IN' => [
                    'ms2colors.product.content',
                    'ms2colors.product.row',
                    'ms2colors.filter.outer',
                    'ms2colors.filter.color',
                ],
            ]);
            foreach ($chunks as $item) {
                $item->set('category', $category->get('id'));
                $item->save();
            }

            $snippets = $modx->getCollection('modSnippet', [
                'name:IN' => [
                    'ms2ColorsProducts',
                ],
            ]);
            foreach ($snippets as $item) {
                $item->set('category', $category->get('id'));
                $item->save();
            }

            $plugins = $modx->getCollection('modPlugin', [
                'name:IN' => [
                    'ms2Colors',
                ],
            ]);
            foreach ($plugins as $item) {
                $item->set('category', $category->get('id'));
                $item->save();
            }
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}
return true;
