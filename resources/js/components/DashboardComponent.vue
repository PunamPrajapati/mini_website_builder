<template>
  <div class="dashboard-container">
    <SidebarComponent />
    <div class="main-content">
      <HeaderComponent />
      <DashboardOverviewComponent />
      <FooterComponent />
    </div>
  </div>
</template>

<script>
import SidebarComponent from './SidebarComponent.vue';
import HeaderComponent from './HeaderComponent.vue';
import DashboardOverviewComponent from './DashboardOverviewComponent.vue';
import FooterComponent from './FooterComponent.vue';

export default {
  components: {
    SidebarComponent,
    HeaderComponent,
    DashboardOverviewComponent,
    FooterComponent,
  },
};
</script>

<style src="./resources/css/dashboard.css"></style>