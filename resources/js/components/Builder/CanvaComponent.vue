<template>
  <div
    class="canvas"
    @dragover.prevent
    @drop="handleDrop"
  >
    <div
      v-for="item in droppedItems"
      :key="item.id"
      :style="{ position: 'absolute', top: item.position.y + 'px', left: item.position.x + 'px' }"
      @click="$emit('selectItem', item)"
      class="dropped-item"
    >
      <component :is="getComponentType(item.type)" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    droppedItems: Array,
  },
  methods: {
    handleDrop(event) {
      const position = {
        x: event.offsetX,
        y: event.offsetY,
      };
      this.$emit('drop', position);
    },
    getComponentType(type) {
      switch (type) {
        case 'box':
          return 'div';
        case 'text':
          return 'p';
        case 'image':
          return 'img';
        case 'button':
          return 'button';
        default:
          return 'div';
      }
    },
  },
};
</script>

<style scoped>
.canvas {
  flex: 1;
  position: relative;
  background: #eef;
  border: 1px solid #ddd;
}
.dropped-item {
  cursor: pointer;
}
</style>