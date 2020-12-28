'use strict';

Ext.namespace('ms2Colors.combo.selectLocal');

ms2Colors.combo.selectLocal.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        //Custom settings
        store: [],
        fields: [],
        displayField: null,
        valueField: null,

        //Core settings
        queryMode: 'local',
        name: config.name || 'select-local',
        typeAhead: true,
        editable: true,
        allowBlank: true,
        emptyText: _('no'),
    });
    if (!config.hiddenName) {
        config.hiddenName = config.name;
    }
    ms2Colors.combo.selectLocal.abstract.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.combo.selectLocal.abstract, MODx.combo.ComboBox);
