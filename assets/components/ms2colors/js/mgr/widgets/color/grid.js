'use strict';

ms2Colors.grid.color = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-color';
    }
    Ext.applyIf(config, {
        url: ms2Colors.config.connectorUrl,
        baseParams: {
            action: 'mgr/color/getlist'
        },
        save_action: 'mgr/color/updatefromgrid',
        fields: [
            'id',
            'resource_id',
            'name',
            'description',
            'image',
            'menuindex',
            'is_active',
        ],
        gridColumns: {
            'id': {header: _('id'), width: 0.05},
            'image': {header: _('ms2colors.field.image'), width: 0.1, renderer: ms2Colors.renderer.image},
            'name': {header: _('ms2colors.field.name'), width: 0.7, editor: {xtype: 'textfield'}},
            'is_active': {header: _('ms2colors.field.active'), width: 0.1, editor: {xtype: 'combo-boolean', renderer: 'boolean'}, renderer: ms2Colors.renderer.boolean}
        },
        recordActions: {
            xtype: 'ms2colors-window-color',
            action: {
                create: 'mgr/color/create',
                update: 'mgr/color/update',
                remove: 'mgr/color/remove'
            }
        }
    });
    ms2Colors.grid.color.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.color, ms2Colors.grid.abstract, {});
Ext.reg('ms2colors-grid-color', ms2Colors.grid.color);
