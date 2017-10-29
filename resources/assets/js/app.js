
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('search', require('./components/Search.vue'));

//import Icon from './components/Icon.vue';
//import Search from './components/Search.vue';

import axios from 'axios';
import _ from 'lodash';

if (document.querySelector('#root')) {

    // highlight filter
    Vue.filter('highlight', function(words, query) {
        let iQuery = new RegExp(query, "ig");
        return words.toString().replace(iQuery, function(matchedTxt,a,b){
            return ('<strong>' + matchedTxt + '</strong>');
        });
    });

    const app = new Vue({
        el: '#root',
        /**
         * The component´s data.
         */
        data() {

            return {
                products: [],

                order: {
                    customer: 'Daniel Pérez Atanacio',
                    subtotal: 0,
                    discount: 0,
                    vat: 0,
                    total: 0,
                    letter: '',
                    notes: '',
                    items: []
                },

                searchQuery: 'Usb 32GB ',
                searching: '',
                isOpen: false,

                selectedProduct: null
            }
        },

        /**
         * Prepare the component (Vue 2.x)
         */
        mounted() {
            // TODO
            this.$refs.search.focus();
        },

        watch: {
            searchQuery: function(val, oldVal) {

                if (this.searchQuery != '' && this.selectedProduct == null) {
                    // change of searchQuery, do something
                    this.searching = 'Buscando...';
                    this.searchProducts(val);
                }
            }
        },

        methods: {
            highlight (str) {
                if (str && this.searchQuery) {
                    let highlight = [this.searchQuery.trim(), this.searchQuery.toLowerCase().trim()];
                    str = ' ' + str;

                    return str.replace(new RegExp('(.)(' + highlight.join('|') + ')(.)', 'ig'), '$1<strong>$2</strong>$3');
                }
                else {
                    return str;
                }
            },

            handleItemClick(product) {

                if (product) {
                    this.selectedProduct = product;
                    this.searchQuery = `(${this.selectedProduct.sku}) - ${this.selectedProduct.name}`;

                    this.isOpen = false;
                }

            },

            handleAddProduct() {

                if (this.selectedProduct) {

                    let priceStr = this.selectedProduct['sellingpricewithvat'];

                    let qty = 1;
                    let price = priceStr.replace(/,/, '');
                    let amount = price * qty;

                    let product = {
                        qty: qty,
                        product: `(${this.selectedProduct.sku}) - ${this.selectedProduct.name}`,
                        price: priceStr,
                        amount: amount
                    };

                    this.order.items = this.order.items.concat(product);

                    let initValue = 0;

                    let total = this.order.items.reduce((carry, item) => {
                        return carry + item.amount;
                    }, initValue);

                    this.order.total = total.toFixed(2);
                    this.order.vat = (total / 1.16 * 0.16).toFixed(2);
                    this.order.subtotal = (total - (total / 1.16 * 0.16)).toFixed(2);

                    this.clearSearch();
                }
            },

            clearSearch(evt) {
                if (evt) {
                    evt.preventDefault();
                }

                this.$refs.search.focus();

                this.selectedProduct = null;
                this.searchQuery = '';
            },

            /**
             * Get all of the products
             */
            getProducts() {
                axios.get('/api/v1/products')
                    .then(response => {
                        console.log(response);
                        this.products = response.data.products;
                    });
            },

            searchProducts: _.debounce(function() {

                if (this.selectedProduct == null) {

                    this.isOpen = true;
                    let _this = this;

                    axios.get('/api/v1/products/' + this.searchQuery)
                        .then(response => {
                            let products = response.data.products;

                            products.forEach((product) => {
                               product['name'] = this.highlight(product['name']);
                            });

                            this.products = products;
                            this.searching = '';
                        });
                }

            }, 500)
        }
    });


    window.app = app;
}
