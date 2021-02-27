'use strict';

ms2Colors.window.color = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        url: ms2Colors.config.connectorUrl
    });
    ms2Colors.window.color.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.window.color, ms2Colors.window.abstract, {
    defaultValues: {
        is_active: 1,
    },

    renderForm: function () {
        ms2Colors.window.color.superclass.renderForm.call(this);

        let imagePreviewField = Ext.getCmp('color-image-preview');
        let src = abstractModule.config.cssUrl + 'mgr/no-photo.png';
        if (this.record.image) {
            src = this.record.image;
        }
        imagePreviewField.setValue('<img src="' + MODx.config.connectors_url + 'system/phpthumb.php?&src=' + src + '&h=100&aoe=0&far=0" alt="">');
    },

    setRecord: function () {
        let grid = Ext.getCmp('ms2colors-grid-colorproperty');
        let store = grid.getStore();
        store.removeAll();
        Ext.each(this.record.properties, function (item) {
            store.add(new Ext.data.Record(item));
        }, this);
        ms2Colors.window.color.superclass.setRecord.call(this);
    },

    beforeSubmit: function (record) {
        let grid = Ext.getCmp('ms2colors-grid-colorproperty');
        let store = grid.getStore();
        let records = store.getRange();
        let properties = [];
        Ext.each(records, function (rec) {
            properties.push(rec.data);
        }, this);
        this.fp.getForm().setValues({
            properties: Ext.encode(properties)
        });
        return ms2Colors.window.color.superclass.beforeSubmit.call(this, record);
    },

    getFields: function (config) {
        return ms2Colors.component.tabs([
            {
                title: _('ms2colors_color_data'),
                items: [
                    {xtype: 'hidden', name: 'id'},
                    {xtype: 'hidden', name: 'resource_id', value: config.resource_id},
                    this.getFormInput('name', {fieldLabel: _('ms2colors_color_name')}),
                    this.getFormInput('image', {xtype: 'ms2colors-combo-browser-image', fieldLabel: _('ms2colors_color_image'), id: 'color-image'}),
                    this.getFormInput('image_preview', {xtype: 'displayfield', cls: 'formpanel-image', id: 'color-image-preview', fieldLabel: ''}),
                    this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('ms2colors_color_active')}),
                    this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('ms2colors_color_description')}),
                ],
            }, {
                title: _('ms2colors_color_properties'),
                items: [
                    {xtype: 'hidden', name: 'properties'},
                    {xtype: 'ms2colors-grid-colorproperty'},
                ]
            }
        ]);
    },
});
Ext.reg('ms2colors-window-color', ms2Colors.window.color);
