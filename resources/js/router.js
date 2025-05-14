import { createRouter, createWebHistory } from "vue-router";
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import MainComponent from './components/MainComponent.vue';
import DashboardComponent from './components/DashboardComponent.vue';
import WebsiteComponent from './components/Website/WebsiteComponent.vue';
import WebsiteCreateComponent from './components/Website/WebsiteCreateComponent.vue';
import WebsiteEditComponent from './components/Website/WebsiteEditComponent.vue';
import SectionComponent from './components/SectionComponent.vue';
import PageComponent from './components/PageComponent.vue';

const routes = [
    { path: '/', name: 'login', component: LoginComponent },
    { path: '/register', name: 'register', component: RegisterComponent },
    {
        path: '/',
            component: MainComponent,
            children: [
            { path: 'dashboard', name: 'dashboard', component: DashboardComponent },
            { path: 'websites', name: 'websites', component: WebsiteComponent},
            { path: 'websites/create', name: 'websitesCreate', component: WebsiteCreateComponent },
            { path: 'websites/edit/:id', name: 'websitesEdit', component: WebsiteEditComponent },
            { path: 'sections', name: 'sections', component: SectionComponent },
            { path: 'pages', name: 'pages', component: PageComponent },
        ],
    },

];

export default createRouter({
    history: createWebHistory(),
    routes,
});