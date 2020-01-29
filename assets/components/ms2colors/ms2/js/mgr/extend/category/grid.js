'use strict';

Ext.namespace('ms2Colors.grid.color');

ms2Colors.grid.color.category = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-grid-color-category';
    }
    Ext.applyIf(config, {});
    ms2Colors.grid.color.category.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.grid.color.category, ms2Colors.grid.color, {
    initComponent: function() {
        this.baseParams.resource_id = this.recordId;
        ms2Colors.grid.color.category.superclass.initComponent.call(this);
    },

    createRecord: function (btn, e) {
        ms2Colors.grid.color.category.superclass.createRecord.call(this, btn, e);
        var window = Ext.getCmp(this.recordActions.xtype);
        window.setValues({
            resource_id: this.config.recordId
        });
    }
});
Ext.reg('ms2colors-grid-color-category', ms2Colors.grid.color.category);
