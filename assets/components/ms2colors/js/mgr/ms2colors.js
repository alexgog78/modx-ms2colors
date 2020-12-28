'use strict';

var ms2Colors = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        config: {},
        page: {},
        panel: {},
        formPanel: {},
        grid: {},
        localGrid: {},
        window: {},
        tree: {},
        combo: {},
        component: {},
        renderer: {},
        function: {},
    });
    ms2Colors.superclass.constructor.call(this, config);
};
Ext.extend(ms2Colors, Ext.Component);
Ext.reg('ms2colors', ms2Colors);
ms2Colors = new ms2Colors();
