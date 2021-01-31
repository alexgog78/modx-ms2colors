'use strict';

ms2Colors.combo.selectColor = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: ms2Colors.config.connectorUrl,
        baseParams: {
            action: 'mgr/color/getlist',
            combo: 1
        },
        fields: [
            'id',
            'category_pagetitle',
            'name',
            'image'
        ],
        displayField: 'name',
        valueField: 'id',
        tpl: new Ext.XTemplate(
            '<tpl for="."><div class="x-combo-list-item">',
            '<tpl if="image"><img src="{MODx.config.connectors_url}system/phpthumb.php?src={image}&w=10&h=10&zc=1&f=png&bg=ffffff" alt="" class="combo-image"></tpl>',
            '<span style="font-weight: bold">{name:htmlEncode}</span>',
            '<tpl if="category_pagetitle"><span style="font-style:italic"> - ({category_pagetitle:htmlEncode})</span></tpl>',
            '</div></tpl>'
        )
    });
    if (config.resource_id !== undefined) {
        config.baseParams.resource_id = config.resource_id;
    }
    if (config.category_id !== undefined) {
        config.baseParams.category_id = config.category_id;
    }
    ms2Colors.combo.selectColor.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.combo.selectColor, ms2Colors.combo.select.remote.abstract);
Ext.reg('ms2colors-combo-select-color', ms2Colors.combo.selectColor);
