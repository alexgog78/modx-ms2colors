'use strict';

Ext.namespace('ms2Colors.grid.settings');

ms2Colors.grid.settings.color = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-settings-color';
    }
    Ext.applyIf(config, {});
    ms2Colors.grid.settings.color.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.settings.color, ms2Colors.grid.color, {
    initComponent: function() {
        this.baseParams.resource_id = 0;
        ms2Colors.grid.settings.color.superclass.initComponent.call(this);
    },
});
Ext.reg('ms2colors-grid-settings-color', ms2Colors.grid.settings.color);
