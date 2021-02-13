'use strict';

miniShop2.plugin.ms2Colors = {
    //Product form
    getFields: function (config) {
        return {
            ms2colors_common_id: {xtype: 'ms2colors-combo-select-color', fieldLabel: _('ms2colors_color_common'), description: '<b>[[+ms2colors_color_common]]</b>', resource_id: 0},
            ms2colors_collection_id: {xtype: 'ms2colors-combo-select-color', fieldLabel: _('ms2colors_color_collection'), description: '<b>[[+ms2colors_color_collection]]</b>', category_id: config.record.parent},
        }
    },

    //Products grid
    getColumns: function () {
        return {}
    }
};
