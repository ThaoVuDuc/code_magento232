var config = {
    config: {
        mixins : {
            //extend class catalog-add-to-cart
            "Magento_Catalog/js/catalog-add-to-cart": {
                "MGS_Test/js/catalog-add-to-cart-mixin": true
            },
            'Magento_Checkout/js/view/shipping': {
                'MGS_Test/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'MGS_Test/js/view/shipping-payment-mixin': true
            }
        }
    },
    //override
    // "map": {
    //     "*": {
    //         "catalogAddToCart": "MGS_Test/js/catalog-add-to-cart-override"
    //     }
    // }
};