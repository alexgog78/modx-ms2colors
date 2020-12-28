'use strict';

ms2Colors.combo.browser.image = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        source: ms2Colors.config.fileSource
    });
    ms2Colors.combo.browser.image.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors.combo.browser.image, ms2Colors.combo.browser.abstract);
Ext.reg('ms2colors-combo-browser-image', ms2Colors.combo.browser.image);
