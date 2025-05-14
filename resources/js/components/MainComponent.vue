<template>
  <div class="layout">
      <HeaderComponent />
        <div class="main-content">
            <SidebarComponent />
            <div class="content">
                <router-view />
            </div>
        </div>
      <FooterComponent />
  </div>
</template>

<script>
import SidebarComponent from './SidebarComponent.vue';
import HeaderComponent from './HeaderComponent.vue';
import FooterComponent from './FooterComponent.vue';

export default {
  components: {
    HeaderComponent,
    SidebarComponent,
    FooterComponent,
  },
};
</script>

<style>
@import './resources/css/dashboard.css';
</style>