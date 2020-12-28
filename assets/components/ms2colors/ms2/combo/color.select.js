'use strict';

ms2Colors.combo.selectColor = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: ms2Colors.config.connectorUrl,
        baseParams: {
            action: 'mgr/color/getlist',
            combo: true
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
            '<tpl if="image"><img src="/{image}" width="10" height="10" alt="" class="combo-image"></tpl>',
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
    console.log(config.baseParams);
    ms2Colors.combo.selectColor.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.combo.selectColor, ms2Colors.combo.selectRemote.abstract);
Ext.reg('ms2colors-combo-select-color', ms2Colors.combo.selectColor);
