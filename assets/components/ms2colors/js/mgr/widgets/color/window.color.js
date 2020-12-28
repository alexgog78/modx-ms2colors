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
        let src = ms2Colors.config.cssUrl + 'mgr/core/no-photo.png';
        if (this.record.image) {
            src = this.record.image;
        }
        imagePreviewField.setValue('<img src="' + MODx.config.connectors_url + 'system/phpthumb.php?&src=' + src + '&h=100&aoe=0&far=0" alt="">');
    },

    getFields: function (config) {
        return [
            {xtype: 'hidden', name: 'id'},
            {xtype: 'hidden', name: 'resource_id', value: config.resource_id},
            this.getFormInput('name', {fieldLabel: _('ms2colors_color_name')}),
            this.getFormInput('image', {xtype: 'ms2colors-combo-browser-image', fieldLabel: _('ms2colors_color_image'), id: 'color-image'}),
            this.getFormInput('image_preview', {xtype: 'displayfield', cls: 'formpanel-image', id: 'color-image-preview', fieldLabel: ''}),
            this.getFormInput('is_active', {xtype: 'combo-boolean', fieldLabel: _('ms2colors_color_active')}),
            this.getFormInput('description', {xtype: 'textarea', fieldLabel: _('ms2colors_color_description')}),
        ];
    },
});
Ext.reg('ms2colors-window-color', ms2Colors.window.color);
