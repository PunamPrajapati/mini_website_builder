<template>
  <div class="toolbar">
    <button @click="addElement('text')">Add Text</button>
    <button @click="addElement('image')">Add Image</button>
    <button @click="addElement('button')">Add Button</button>
  </div>
</template>

<script>
export default {
  name: 'Toolbar',
  methods: {
    addElement(type) {
      this.$emit('add-element', type);
    }
  }
};
</script>

<style>
.toolbar {
  margin: 10px;
  display: flex;
  gap: 10px;
}
</style>