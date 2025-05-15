<template>
  <div class="page-builder">
    <BuilderSidebarComponent :items="components" @dragStart="handleDragStart" />
    <CanvaComponent
      :droppedItems="droppedItems"
      @drop="handleDrop"
      @selectItem="handleSelectItem"
    />
    <PropertiesPanelComponent
      v-if="selectedItem"
      :item="selectedItem"
      @updateItem="handleUpdateItem"
    />
  </div>
</template>

<script>
import BuilderSidebarComponent from '../Builder/BuilderSidebarComponent.vue';
import CanvaComponent from '../Builder/CanvaComponent.vue';
import PropertiesPanelComponent from '../Builder/PropertiesPanelComponent.vue';

export default {
  components: {
    BuilderSidebarComponent,
    CanvaComponent,
    PropertiesPanelComponent,
  },
  data() {
    return {
      components: [
        { id: 'box', label: 'Box', type: 'box' },
        { id: 'text', label: 'Text', type: 'text' },
        { id: 'image', label: 'Image', type: 'image' },
        { id: 'button', label: 'Button', type: 'button' },
      ],
      droppedItems: [], // Tracks items dropped in the canvas
      selectedItem: null, // Selected item for customization
    };
  },
  methods: {
    handleDragStart(item) {
      this.draggedComponent = item;
    },
    handleDrop(position) {
      this.droppedItems.push({
        id: Date.now(),
        type: this.draggedComponent.type,
        position,
        properties: {}, // Store customizable properties
      });
    },
    handleSelectItem(item) {
      this.selectedItem = item;
    },
    handleUpdateItem(updatedItem) {
      const index = this.droppedItems.findIndex(
        (item) => item.id === updatedItem.id
      );
      if (index !== -1) {
        this.droppedItems[index] = updatedItem;
      }
    },
  },
};
</script>

<style scoped>
.page-builder {
  display: flex;
  height: 100vh;
}
</style>