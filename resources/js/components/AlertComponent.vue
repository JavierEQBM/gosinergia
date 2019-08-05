<template>
  <div>
    <b-modal ref="my-modal" hide-footer :title="this.title">
      <div class="d-block text-center">
        <h4 v-text="this.message"></h4>
      </div>

      <b-button class="mt-3" variant="outline-danger" @click="hideModal">Close</b-button>
    </b-modal>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        title : null,
        message : null
      }
    },

    methods: {
      showModal(data) {
        this.title = data.title
        this.message = data.message
        this.$refs['my-modal'].show()
      },

      hideModal() {
        this.$refs['my-modal'].hide()
      },
    },

    created() {
      this.$AlertHub.$on('show', this.showModal)
    },
  }
</script>