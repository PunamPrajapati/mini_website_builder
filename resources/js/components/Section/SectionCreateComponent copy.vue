<template>
  <div class="drag-drop-editor">
    <h2>Create Section</h2>
    
    <div class="editor-container">
      <!-- Sidebar with draggable elements -->
      <div class="elements-sidebar">
        <h3>Elements</h3>
        <div 
          class="draggable-item" 
          v-for="(element, index) in elements" 
          :key="index" 
          draggable="true" 
          @dragstart="startDrag(element)"
        >
          {{ element.name }}
        </div>
      </div>

      <!-- Drop area for creating the section -->
      <div 
        class="drop-area" 
        @dragover.prevent 
        @drop="onDrop"
      >
        <p v-if="droppedElements.length === 0">Drag elements here to start building your section</p>
        <div
          v-for="(item, index) in droppedElements"
          :key="index"
          class="dropped-item"
          :style="{ top: item.y + 'px', left: item.x + 'px' }"
          @mousedown="startMove(index, $event)"
        >
          <span>{{ item.name }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "DragDropEditor",
  data() {
    return {
      elements: [
        { name: "Text" },
        { name: "Image" },
        { name: "Button" },
        { name: "Shape" },
      ],
      droppedElements: [], // Elements dropped into the drop area
      movingElementIndex: null, // Index of the element currently being moved
      offsetX: 0, // X offset while dragging
      offsetY: 0, // Y offset while dragging
    };
  },
  methods: {
    // Handle drag start
    startDrag(element) {
      this.draggedElement = element;
    },
    // Handle drop
    onDrop(event) {
      const x = event.offsetX;
      const y = event.offsetY;

      if (this.draggedElement) {
        this.droppedElements.push({
          ...this.draggedElement,
          x,
          y,
        });
        this.draggedElement = null; // Clear the dragged element
      }
    },
    // Start moving an element
    startMove(index, event) {
      this.movingElementIndex = index;
      const element = this.droppedElements[index];
      this.offsetX = event.clientX - element.x;
      this.offsetY = event.clientY - element.y;

      // Attach mousemove and mouseup listeners
      document.addEventListener("mousemove", this.moveElement);
      document.addEventListener("mouseup", this.stopMove);
    },
    // Move the selected element
    moveElement(event) {
      if (this.movingElementIndex !== null) {
        const x = event.clientX - this.offsetX;
        const y = event.clientY - this.offsetY;

        this.$set(this.droppedElements, this.movingElementIndex, {
          ...this.droppedElements[this.movingElementIndex],
          x,
          y,
        });
      }
    },
    // Stop moving the element
    stopMove() {
      this.movingElementIndex = null;

      // Remove mousemove and mouseup listeners
      document.removeEventListener("mousemove", this.moveElement);
      document.removeEventListener("mouseup", this.stopMove);
    },
  },
};
</script>

<style scoped>
.drag-drop-editor {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

.editor-container {
  display: flex;
  width: 100%;
  max-width: 1200px;
  border: 1px solid #ddd;
  border-radius: 5px;
  overflow: hidden;
}

.elements-sidebar {
  width: 200px;
  background-color: #f8f9fa;
  padding: 10px;
  border-right: 1px solid #ddd;
}

.elements-sidebar h3 {
  margin-bottom: 10px;
}

.draggable-item {
  padding: 10px;
  margin-bottom: 8px;
  background-color: #007bff;
  color: #fff;
  text-align: center;
  border-radius: 5px;
  cursor: grab;
}

.draggable-item:active {
  cursor: grabbing;
}

.drop-area {
  flex-grow: 1;
  position: relative;
  background-color: #f1f1f1;
  padding: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.drop-area p {
  color: #aaa;
}

.dropped-item {
  position: absolute;
  padding: 10px;
  background-color: #ffc107;
  color: #fff;
  border-radius: 5px;
  cursor: move;
  user-select: none;
}
</style>
