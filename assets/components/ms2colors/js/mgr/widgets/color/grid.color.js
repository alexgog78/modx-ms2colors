'use strict';

ms2Colors.grid.color = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-color';
    }
    Ext.applyIf(config, {
        url: ms2Colors.config.connectorUrl,
        baseParams: {
            action: 'mgr/color/getlist',
        },
        save_action: 'mgr/color/updatefromgrid',
        fields: [
            'id',
            'resource_id',
            'category_pagetitle',
            'name',
            'description',
            'image',
            'sort_order',
            'is_active',
        ],
        columns: [
            this.getGridColumn('id', {header: _('id'), width: 0.05}),
            this.getGridColumn('name', {header: _('ms2colors_color_name'), width: 0.7, editor: {xtype: 'textfield'}}),
            this.getGridColumn('image', {header: _('ms2colors_color_image'), width: 0.2, renderer: ms2Colors.renderer.image}),
            this.getGridColumn('is_active', {header: _('ms2colors_color_active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: ms2Colors.renderer.boolean}),
        ],
        recordActions: {
            quickCreate: {
                xtype: 'ms2colors-window-color',
                action: 'mgr/color/create',
                resource_id: config.resource_id || 0,
            },
            quickUpdate: {
                xtype: 'ms2colors-window-color',
                action: 'mgr/color/update',
            },
            remove: {
                action: 'mgr/color/remove'
            },
        },
    });
    ms2Colors.grid.color.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.color, ms2Colors.grid.abstract);
Ext.reg('ms2colors-grid-color', ms2Colors.grid.color);
