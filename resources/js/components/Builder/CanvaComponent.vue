<template>
  <div class="workspace">
    <div
      v-for="element in elements"
      :key="element.id"
      class="workspace-element"
    >
      <component
        :is="getComponentType(element.type)"
        :content.sync="element.content"
      />
      <component
        :is="getComponentType(element.type)"
        :content.sync="element.content"
      />
    </div>
  </div>
</template>

<script>

import EditableButtonComponent from '../Builder/EditableButtonComponent.vue';
import EditableTextComponent from '../Builder/EditableTextComponent.vue';
import EditableImageComponent from '../Builder/EditableImageComponent.vue';

export default {
  name: 'CanvaComponent',
  component: {
    EditableTextComponent,
    EditableImageComponent,
    EditableButtonComponent,
  },
  props: {
    elements: Array
  },
  methods: {
    getComponentType(type) {
    console.log(type);
      if (type === 'text') return 'EditableTextComponent';
      if (type === 'image') return 'EditableImageComponent';
      if (type === 'button') return 'EditableButtonComponent';
    }
  }
};
</script>

<style>
.workspace {
  border: 1px solid #ddd;
  width: 100%;
  min-height: 400px;
  display: flex;
  flex-wrap: wrap;
  padding: 10px;
}
.workspace-element {
  margin: 5px;
}
</style>