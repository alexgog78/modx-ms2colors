'use strict';

ms2Colors.notice.indevelopment = function (config) {
    config = config || {};
    Ext.applyIf(config, {});
    ms2Colors.notice.indevelopment.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.notice.indevelopment, ms2Colors.notice.abstract, {
    panelHtml: _('ms2colors.field.indevelopment')
});
Ext.reg('ms2colors-notice-indevelopment', ms2Colors.notice.indevelopment);
