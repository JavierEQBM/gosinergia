<template>
    <div>
        <form-product-component @create="create"></form-product-component>

        <product-component 
            v-if="is_mounted" 
            v-for="(product, index) in products" 
            :key="product.id" 
            :product="product"
            :login="login"
            @update="update(...arguments)"
            @remove="remove(index)">
        </product-component>
    </div>
</template>

<script>
    export default{
        props : [
            'login'
        ],

        data() {
            return {
               is_mounted : false,
               products: []
            }
        },


        methods : {
            create(product){
                this.products.unshift(product);
            },

            update(product){
                this.products[this.products.findIndex(p => p.id == product.id)].updated_at = product.updated_at;
            },

            remove(product){
                this.products.splice(product, 1);
            }
        },

        computed : {
            index_route() {
                return (this.login == '1' || this.login == 1) ? 'admin/products' : 'guest/products';
            }
        },

        mounted() {
            this.is_mounted = true;

            axios.get(this.index_route)
                .then((response) => {
                    this.products = response.data;
                });
        }
    }
</script>