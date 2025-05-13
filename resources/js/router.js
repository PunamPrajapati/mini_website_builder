import { createRouter, createWebHistory } from "vue-router";
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import DashboardComponent from './components/DashboardComponent.vue';

const routes = [
    { path: '/', name: 'login', component: LoginComponent },
    { path: '/register', name: 'register', component: RegisterComponent },
    { path: '/dashboard', name: 'dashboard', component: DashboardComponent },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});