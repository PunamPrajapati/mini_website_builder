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
            <router-link v-if="item.url" :to="item.url">
              {{ item.label }}
            </router-link>
            
            <!-- Use plain text for items without a URL -->
            <span v-else>
              {{ item.label }}
            </span>
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
        { name: 'dashboard', label: 'Dashboard', url: '/dashboard' },
        { name: 'websites', label: 'Websites', url: '/websites' },
        { name: 'sections', label: 'Sections', url: '/sections' },
        { name: 'pages', label: 'Pages', url: '/pages' },
        { name: 'settings', label: 'Settings', url: '/settings' },
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