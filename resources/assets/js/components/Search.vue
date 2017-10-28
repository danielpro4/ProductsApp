<template>
    <div class="uk-card uk-card-default">
        <div class="uk-card-header">
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <form class="uk-display-inline uk-search uk-search-home uk-search-default">
                    <span class="uk-icon uk-search-icon">
                        <icon name="search" :scale="100"></icon>
                    </span>
                    <input v-model="searchText"
                           class="uk-search-input"
                           type="search" placeholder="Buscar producto...">
                </form>
                <span class="uk-flex-right">{{searchLoading}}</span>
            </div>
        </div> <!-- /.uk-card-header -->

        <div class="uk-card-body">
            <table class="uk-table uk-table-middle uk-table-responsive uk-table-divider uk-table-hov2er"
                   cellpadding="0"
                   cellspacing="0">
                <thead>
                    <tr>
                        <th>Producto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" class="table-row">
                        <td>
                            <div class="pg-product-list__item">
                                <figure class="product-picture">
                                    <img class="uk-preserve-width uk-border-circle" src="/images/product.jpg" width="40"
                                         >
                                </figure>
                                <div class="product-name">
                                    <a href="#">{{product.name}}</a>
                                    <div class="uk-text-small">{{product.category}}</div>
                                </div>
                                <div class="product-price">
                                    {{product.sellingpricewithvat}}
                                </div>

                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.uk-card-body -->

        <div class="uk-card-footer">

        </div><!-- /.uk-card-footer -->
    </div><!-- ./uk-card -->
</template>

<script>
    import Icon from './Icon.vue'
    import axios from "axios";
    import _ from 'lodash';

    export default {
        components: {
            'icon': Icon
        },

        /**
         * The component´s data.
         */
        data() {
            return {
                products: [],
                searchText: '',
                searchLoading: ''
            }
        },

        /**
         * Prepare the component (Vue 2.x)
         */
        mounted() {
            this.prepareComponent();
        },

        watch: {
            searchText: function(val, oldVal) {
                // change of searchText, do something
                this.searchLoading = 'Buscando...'
                this.searchProducts(val);
            }
        },

        methods: {
            prepareComponent() {

                this.getProducts();
            },

            /**
             * Get all of the products
             */
            getProducts() {
                axios.get('/api/v1/products')
                    .then(response => {
                        this.products = response.data.products;
                    });
            },

            searchProducts: _.debounce(function() {
                console.log(this.searchText);

                axios.get('/api/v1/products/' + this.searchText)
                    .then(response => {
                        this.products = response.data.products;

                        this.searchLoading = '';
                    });

            }, 500)
        }

    }
</script>
