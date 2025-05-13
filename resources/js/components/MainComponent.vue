<template>
  <div class="layout">
      <HeaderComponent />
        <div class="main-content">
            <SidebarComponent />
            <div class="content">
                <DashboardComponent />
            </div>
        </div>
      <FooterComponent />
  </div>
</template>

<script>
import SidebarComponent from './SidebarComponent.vue';
import HeaderComponent from './HeaderComponent.vue';
import DashboardComponent from './DashboardComponent.vue';
import FooterComponent from './FooterComponent.vue';

export default {
  components: {
    HeaderComponent,
    SidebarComponent,
    DashboardComponent,
    FooterComponent,
  },
};
</script>

<style>
@import './resources/css/dashboard.css';
</style>