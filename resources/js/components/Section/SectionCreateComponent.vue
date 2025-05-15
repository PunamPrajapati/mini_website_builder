<template>
  <div id="section-app">
    <BuilderSidebarComponent @add-element="addElement" />
    <CanvaComponent :elements="elements" />
  </div>
</template>

<script>
import BuilderSidebarComponent from '../Builder/BuilderSidebarComponent.vue';
import CanvaComponent from '../Builder/CanvaComponent.vue';


export default {
  name: 'SectionCreate',
  components: {
    BuilderSidebarComponent,
    CanvaComponent
  },
  data() {
    return {
      elements: []
    };
  },
  methods: {
    addElement(type) {
    console.log(type);
      const newElement = { type, id: Date.now(), content: type === 'text' ? 'Edit me!' : '' };
      console.log(newElement);
      this.elements.push(newElement);
    }
  }
};
</script>

<style>
#section-app {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>