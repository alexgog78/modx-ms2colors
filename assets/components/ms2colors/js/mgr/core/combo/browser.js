'use strict';

Ext.namespace('ms2Colors.combo.browser');

ms2Colors.combo.browser.abstract = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        source: config.source || MODx.config.default_media_source
    });
    ms2Colors.combo.browser.abstract.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.combo.browser.abstract, MODx.combo.Browser, {
    onTriggerClick: function (btn) {
        if (this.disabled) {
            return false;
        }
        this.browser = MODx.load({
            xtype: 'modx-browser',
            closeAction: 'close',
            id: Ext.id(),
            multiple: true,
            source: this.config.source || MODx.config.default_media_source,
            hideFiles: this.config.hideFiles || false,
            rootVisible: this.config.rootVisible || false,
            allowedFileTypes: this.config.allowedFileTypes || '',
            wctx: this.config.wctx || 'web',
            openTo: this.config.openTo || '',
            rootId: this.config.rootId || '/',
            hideSourceCombo: this.config.hideSourceCombo || false,
            listeners: {
                'select': {
                    fn: function (data) {
                        this.setValue(data.fullRelativeUrl);
                        if (this.config.id) {
                            var field = Ext.getCmp(this.config.id + '-preview');
                        } else {
                            var field = Ext.getCmp(this.config.name + '-preview');
                        }
                        if (field) {
                            field.setValue('<img src="/connectors/system/phpthumb.php?&h=100&aoe=0&far=0&src=' + data.fullRelativeUrl + '" alt="">');
                        }
                    }, scope: this
                }
            }
        });
        this.browser.show(btn);
        return true;
    }
});
