'use strict';

ms2Colors.window.color = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-window-color';
    }
    Ext.applyIf(config, {
        url: ms2Colors.config.connectorUrl
    });
    ms2Colors.window.color.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.window.color, ms2Colors.window.abstract, {
    formInputs: {
        'id': {xtype: 'hidden'},
        'resource_id': {xtype: 'hidden'},
        'name': {xtype: 'textfield', fieldLabel: _('ms2colors.field.name')},
        'image': {xtype: 'ms2colors-combo-browser-color', fieldLabel: _('ms2colors.field.image')},
        'is_active': {xtype: 'combo-boolean', fieldLabel: _('ms2colors.field.active')},
        'description': {xtype: 'textarea', fieldLabel: _('ms2colors.field.description')}
    },

    defaultValues: {
        is_active: 1
    }
});
Ext.reg('ms2colors-window-color', ms2Colors.window.color);
