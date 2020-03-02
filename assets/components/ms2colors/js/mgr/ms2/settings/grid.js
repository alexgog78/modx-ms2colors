'use strict';

Ext.namespace('ms2Colors.grid.color');

ms2Colors.grid.color.settings = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-color-settings';
    }
    Ext.applyIf(config, {});
    ms2Colors.grid.color.settings.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.color.settings, ms2Colors.grid.color, {
    initComponent: function() {
        this.baseParams.resource_id = 0;
        ms2Colors.grid.color.settings.superclass.initComponent.call(this);
    }
});
Ext.reg('ms2colors-grid-color-settings', ms2Colors.grid.color.settings);
