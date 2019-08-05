<template>
    <div>
        <product-component 
            v-if="is_mounted" 
            v-for="(product, index) in products" 
            :key="product.id" 
            :product="product"
            :types="types"
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
               products: [],
               types: []
            }
        },


        methods : {
            store(product){
                this.products.unshift(product);
            },

            update(product){
                this.products[this.products.findIndex(p => p.id == product.id)].updated_at = product.updated_at;
                this.products[this.products.findIndex(p => p.id == product.id)].type = product.type;
            },

            remove(product){
                this.products.splice(product, 1);

                this.$AlertHub.$emit('show', {
                    title : 'Listo',
                    message : 'El producto se eliminó exitosamente'
                });
            }
        },

        computed : {
            index_route() {
                return (this.login == '1' || this.login == 1) ? 'admin/products' : 'guest/products';
            }
        },

        created() {
            this.$ProductHub.$on('store', this.store)
        },

        mounted() {
            this.is_mounted = true;

            axios.get('guest/types')
                .then((response) => {
                    response.data.forEach((element, index) => {
                        this.types.push({value:element.id,text:element.type});
                    });

                    axios.get(this.index_route)
                        .then((response) => {
                            this.products = response.data;
                        });
                });
        }
    }
</script>