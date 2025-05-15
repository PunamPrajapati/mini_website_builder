<template>
  <div class="sidebar">
    <h3>Components</h3>
    <ul>
      <li
        v-for="item in items"
        :key="item.id"
        draggable="true"
        @dragstart="(event) => $emit('dragStart', item, event)"
        class="draggable-item"
      >
        {{ item.label }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: {
    items: Array,
  },
};
</script>

<style scoped>
.sidebar {
  width: 20%;
  background: #f4f4f4;
  padding: 1rem;
}
.draggable-item {
  cursor: grab;
  padding: 0.5rem;
  background: #ffffff;
  margin-bottom: 0.5rem;
  border: 1px solid #ddd;
  border-radius: 4px;
}
</style>