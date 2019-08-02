<template>
    <div class="card mb-3">
        <div class="card-header">Publicado en {{product.created_at}} - Editado en {{product.updated_at}}</div>

        <div class="card-body">
            <input v-if="this.editMode" type="text" class="form-control" v-model="product.name">
            <p v-else v-text="product.name"></p>

            <input v-if="this.editMode" type="text" class="form-control" v-model="product.type.type">
            <p v-else v-text="product.type.type"></p>

            <span v-if="this.login">
                <input v-if="this.editMode" type="text" class="form-control" v-model="product.type.type">
                <p v-else v-text="this.visible_text"></p>
            </span>
        </div>

        <div v-if="this.login" class="card-footer">
            <button v-if="this.editMode" class="btn btn-success" @click="update()">Guardar cambios</button>
            <button v-else class="btn btn-default" @click="edit()" :title="this.title_edit">Editar</button>

            <button class="btn btn-danger" @click="remove()" :title="this.title_delete">Eliminar</button>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
            'product',
            'login'
        ],

        data() {
            return {
                editMode : false,
                title_edit : 'Editar elemento',
                title_delete : 'Eliminar elemento'
            }
        },

        methods : {
            edit() {
                this.editMode = true;
            },

            update() {
                const params = {
                    id : this.product.id,
                    name : this.product.name
                };

                axios.put(`admin/products/${this.product.id}`, params)
                    .then((response) => {
                        this.editMode = false;
                        this.$emit('update', response.data);
                    });
            },

            remove() {
                const params = {
                    id : this.product.id
                };

                axios.delete(`admin/products/${this.product.id}`, params)
                    .then((response) => {
                        this.$emit('remove', response.data);
                    });
            }
        },

        computed : {
            visible_text() {
                return (this.product.visible == '1' || this.product.visible == 1) ? 'Visible' : 'Oculto';
            }
        },

        mounted() {}
    }
</script>
