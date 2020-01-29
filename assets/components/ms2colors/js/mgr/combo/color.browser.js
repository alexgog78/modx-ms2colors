'use strict';

ms2Colors.combo.browserColor = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        source: ms2Colors.config.colorFileSource
    });
    ms2Colors.combo.browserColor.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.combo.browserColor, ms2Colors.combo.browser, {});
Ext.reg('ms2colors-combo-browser-color', ms2Colors.combo.browserColor);
