<template>
  <div class="properties-panel">
    <h3>Properties</h3>
    <div>
      <label>
        Width:
        <input
          v-model="item.properties.width"
          @input="updateItem"
          type="text"
        />
      </label>
      <label>
        Height:
        <input
          v-model="item.properties.height"
          @input="updateItem"
          type="text"
        />
      </label>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: Object,
  },
  methods: {
    updateItem() {
      this.$emit('updateItem', this.item);
    },
  },
};
</script>

<style scoped>
.properties-panel {
  width: 20%;
  background: #f7f7f7;
  padding: 1rem;
  border-left: 1px solid #ddd;
}
</style>