<template>
    <div class="card mb-3">
        <div class="card-header">Agregar producto</div>

        <div class="card-body">
            <form action="" @submit.prevent="create()">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" v-model="name">
                </div>

                <div class="form-group">
                    <label for="name">Codigo</label>
                    <input type="text" class="form-control" name="sku" v-model="sku">
                </div>

                <button type="submit" class="btn btn-primary">Enviar producto</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name : null,
                sku : null,
                visible : 1,
                type_id : 1
            }
        },

        methods: {
            create() {
                const params = {
                    name : this.name,
                    sku : this.sku,
                    visible : this.visible,
                    type_id : this.type_id
                };

                this.name = null;
                this.sku = null;
                this.visible = null;
                this.type_id = null;

                axios.post('admin/products', params)
                    .then((response) => {
                        this.$emit('create', response.data);
                    });
            }
        },

        mounted() {},
    }
</script>