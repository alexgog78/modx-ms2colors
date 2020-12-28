'use strict';

Ext.namespace('ms2Colors.grid.category');

ms2Colors.grid.category.color = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-category-color';
    }
    Ext.applyIf(config, {});
    ms2Colors.grid.category.color.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.category.color, ms2Colors.grid.color, {
    initComponent: function() {
        this.baseParams.resource_id = this.resource_id;
        ms2Colors.grid.category.color.superclass.initComponent.call(this);
    },
});
Ext.reg('ms2colors-grid-category-color', ms2Colors.grid.category.color);
