import { createRouter, createWebHistory } from "vue-router";
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import MainComponent from './components/MainComponent.vue';

const routes = [
    { path: '/', name: 'login', component: LoginComponent },
    { path: '/register', name: 'register', component: RegisterComponent },
    { path: '/dashboard', name: 'dashboard', component: MainComponent },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});