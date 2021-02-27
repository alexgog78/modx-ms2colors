'use strict';

ms2Colors.grid.colorProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-colorproperty';
    }
    Ext.apply(config, {
        fields: [
            'key',
            'value'
        ],
        columns: [
            this.getGridColumn('key', {header: _('ms2colors_color_property_key')}),
            this.getGridColumn('value', {header: _('ms2colors_color_property_value')}),
        ],
        editWindow: {
            xtype: 'ms2colors-window-colorproperty',
        },
    });
    ms2Colors.grid.colorProperty.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.colorProperty, ms2Colors.localGrid, {});
Ext.reg('ms2colors-grid-colorproperty', ms2Colors.grid.colorProperty);
