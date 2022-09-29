/*jshint browser:true jquery:true*/
/*global alert*/
define(
    [
        'uiComponent',
        'jquery',
        'ko',
    ],
    function(Component) {
        "use strict";
        var quoteItemData = window.checkoutConfig.quoteItemData;

        return Component.extend({

            defaults: {
                template: 'AHT_BrandProducts/summary/item/details'
            },
            quoteItemData: quoteItemData,
            getValue: function(quoteItem) {
                return quoteItem.name;
            },
            getBrand: function(quoteItem) {
                var item = this.getItem(quoteItem.item_id);
                return item.lie_brand;
            },
            getProductType: function(quoteItem) {
                var item = this.getItem(quoteItem.item_id);
                return item.product_type
            },

            getItem: function(item_id) {
                var itemElement = null;
                _.each(this.quoteItemData, function(element, index) {
                    if (element.item_id == item_id) {
                        itemElement = element;
                    }
                });
                return itemElement;
            }

        });
    }
);