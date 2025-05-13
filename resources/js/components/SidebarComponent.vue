<template>
  <aside class="sidebar">
    <nav>
      <ul>
        <li
            v-for="item in menuItems"
            :key="item.name"
            :class="{ active: activeItem === item.name }"
            @click="setActive(item.name)"
            >
            <a href="#">{{ item.label }}</a>
        </li>
      </ul>
    </nav>
  </aside>
</template>
<script>
export default {
  data() {
    return {
      activeItem: 'dashboard', // Tracks the currently active menu item
      menuItems: [
        { name: 'dashboard', label: 'Dashboard' },
        { name: 'websites', label: 'Websites' },
        { name: 'sections', label: 'Sections' },
        { name: 'pages', label: 'Pages' },
        { name: 'analytics', label: 'Analytics' },
        { name: 'settings', label: 'Settings' },
        { name: 'support', label: 'Support' },
      ],
    };
  },
  methods: {
    setActive(itemName) {
      this.activeItem = itemName; // Set the clicked menu item as active
    },
  },
};
</script>
<style scoped>
@import './resources/css/sidebar.css';
</style>