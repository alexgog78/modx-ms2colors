'use strict';

ms2Colors.notice.undefined = function (config) {
    config = config || {};
    Ext.applyIf(config, {});
    ms2Colors.notice.undefined.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.notice.undefined, ms2Colors.notice.abstract, {
    panelHtml: _('ms2colors.field.undefined')
});
Ext.reg('ms2colors-notice-undefined', ms2Colors.notice.undefined);
