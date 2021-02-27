'use strict';

ms2Colors.window.colorProperty = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ms2colors-window-colorproperty';
    }
    Ext.apply(config, {});
    ms2Colors.window.colorProperty.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.window.colorProperty, ms2Colors.window.abstract, {
    getFields: function (config) {
        return [
            this.getFormInput('key', {fieldLabel: _('ms2colors_color_property_key'), allowBlank: false}),
            this.getFormInput('value', {xtype: 'textarea', fieldLabel: _('ms2colors_color_property_value'), allowBlank: false}),
        ];
    },

    beforeSubmit: function (record) {
        if (!this.fp.getForm().isValid()) {
            return false;
        }
        return true;
    },

    submit: function (close) {
        let values = this.fp.getForm().getValues();
        let store = this.grid.getStore();
        if (!this.fireEvent('beforeSubmit', values)) {
            return false;
        }
        if (this.config.record && this.config.record.key) {
            let idx = store.find('key', this.config.record.key);
            store.removeAt(idx);
            store.add(new Ext.data.Record(values));
        } else {
            store.add(new Ext.data.Record(values));
        }
        this.close();
    }
});
Ext.reg('ms2colors-window-colorproperty', ms2Colors.window.colorProperty);
