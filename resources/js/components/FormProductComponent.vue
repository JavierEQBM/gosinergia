<template>
    <form action="" @submit.prevent="create()">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" v-model="name">
        </div>

        <div class="form-group">
            <label for="name">Codigo</label>
            <input type="text" class="form-control" name="sku" v-model="sku">
        </div>

        <b-form-group>
            <label for="type">Tipo de producto</label>
            <b-form-select name="type" v-model="type_id" :options="types"></b-form-select>
        </b-form-group>

        <b-form-group>
            <b-form-checkbox
                v-model="visible"
                name="visible"
                value="1"
                unchecked-value="0"
            >
                <label for="visible" v-text="visible_text"></label>
            </b-form-checkbox>
        </b-form-group>

        <button type="submit" class="btn btn-primary">Enviar producto</button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                name : null,
                sku : null,
                type_id: null,
                types: [
                    { value: null, text: 'Seleccione una opción' }
                ],
                visible: 0
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

                axios.post('admin/products', params)
                    .then((response) => {
                        this.$ProductHub.$emit('store', response.data.product);
                        this.clear()
                    }).catch((error) => {
                        this.$AlertHub.$emit('show', {
                            title : error.response.data.message,
                            message : Object.values(error.response.data.errors)[0][0]
                        });
                    });
            },

            clear() {
                this.name = null;
                this.sku = null;
                this.visible = 0;
                this.type_id = null;
            },

            types_index() {
                axios.get('admin/types')
                    .then((response) => {
                        response.data.forEach((element, index) => {
                            this.types.push({value:element.id,text:element.type});
                        });
                    });
            }
        },

        computed : {
            visible_text() {
                return (this.visible == '1' || this.visible == 1) ? 'Visible' : 'Oculto';
            }
        },

        mounted() {
            this.types_index();
        },
    }
</script>