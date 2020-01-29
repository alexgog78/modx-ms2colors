'use strict';

var ms2Colors = function (config) {
    config = config || {};
    ms2Colors.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors, Ext.Component, abstractModule);
Ext.reg('ms2colors', ms2Colors);
var ms2Colors = new ms2Colors();
